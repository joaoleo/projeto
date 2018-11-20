<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;


class Apontamento extends Eloquent
{
    protected $casts = [
        'empresa_id' => 'int',
        'projeto_id' => 'int',
        'consultor_id' => 'int',
        'refeicao' => 'float',
        'estacionamento' => 'float',
        'kms' => 'float',
        'pedagio' => 'float',
        'hospital' => 'float',
        'taxi' => 'float',
        'despesas' => 'float'
    ];

    protected $fillable = [
        'empresa_id',
        'projeto_id',
        'consultor_id',
        'inicio',
        'almoco',
        'fim',
        'refeicao',
        'estacionamento',
        'kms',
        'pedagio',
        'hospital',
        'taxi',
        'despesas',
        'observacao'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'consultor_id');
    }

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id');
    }

    public function projeto()
    {
        return $this->belongsTo(\App\Models\Projeto::class, 'projeto_id');
    }

    public function arredondarMinutos($minutos)
    {
        if ($minutos >= 30) {
            $minutos -= 30;
            $resultado = (30 + round($minutos / 15, 00) * 15);
        } else {
            $resultado = round($minutos / 15, 00) * 15;
        }
        $resultado = $resultado == 0 ? '00' : $resultado; //previne que apareça '0' e força aparecer '00' nos minutos
        return $resultado;
    }

    public function calculoHoras($hora1, $hora2)
    {
        $hora1 = explode(':', $hora1); //decompoe horas e minutos e cria um array com as horas iniciais da jornada
        $hora2 = explode(':', $hora2); //decompoe horas e minutos e cria um array com as horas finais da jornada

        $hora1[1] = $this->arredondarMinutos($hora1[1]); //arredonda minutos
        $hora2[1] = $this->arredondarMinutos($hora2[1]); //arredonda minutos

        $hora_inicial = ($hora1[0] * 60) + $hora1[1]; //converte horas para minutos e soma com os minutos já existentes...
        $hora_final = ($hora2[0] * 60) + $hora2[1]; //faz o mesmo com as horas finais

        if ($hora_inicial < $hora_final) {
            $horas_totais = $hora_final - $hora_inicial;
        } else {
            $horas_totais = (1440 - $hora_inicial) + $hora_final; //24horas-hora_inicial+hora_final
        }

        $resultado[0] = gmdate("H:i", $horas_totais * 60); //tempo total trabalhado convertido de volta pro formato de horas, pus o resultado em um array para poder ter uma função com multiplos retornos
        $inicioPeriodoDiurno = 420; //7 horas em minutos
        $fimPeriodoDiurno = 1320; //22 horas em minutos

        //trabalhou apenas de dia?
        if ($hora_inicial >= $inicioPeriodoDiurno and $hora_inicial <= $fimPeriodoDiurno and $hora_final <= $fimPeriodoDiurno and $horas_totais < 720) {
            $periodoDiurnoTrabalhado = $hora_final - $hora_inicial;
            $periodoNoturnoTrabalhado = 0;

            //comecou a trabalhar de dia e terminou de noite?
        } elseif ($hora_inicial >= $inicioPeriodoDiurno and $hora_inicial <= $fimPeriodoDiurno and ($hora_final >= $fimPeriodoDiurno or $hora_final < $inicioPeriodoDiurno)) {
            $periodoDiurnoTrabalhado = $fimPeriodoDiurno - $hora_inicial;
            $periodoNoturnoTrabalhado = $horas_totais - $periodoDiurnoTrabalhado;

            //comecou a trabalhar de dia e terminou no outro dia?
        } elseif ($hora_inicial >= $inicioPeriodoDiurno and $hora_inicial < $fimPeriodoDiurno and $hora_final > $inicioPeriodoDiurno and $hora_final < $fimPeriodoDiurno) {
            $jornada_diurna1 = $fimPeriodoDiurno - $hora_inicial;
            $jornada_diurna2 = $hora_final - $inicioPeriodoDiurno;
            $periodoDiurnoTrabalhado = $jornada_diurna1 + $jornada_diurna2;
            $periodoNoturnoTrabalhado = $horas_totais - $periodoDiurnoTrabalhado;

            //comecou a trabalhar de noite e terminou de dia?
        } elseif (($hora_inicial < $inicioPeriodoDiurno or $hora_inicial > $fimPeriodoDiurno) and $hora_final > $inicioPeriodoDiurno and $hora_final < $fimPeriodoDiurno) {
            $periodoDiurnoTrabalhado = $hora_final - $inicioPeriodoDiurno;
            $periodoNoturnoTrabalhado = $horas_totais - $periodoDiurnoTrabalhado;

            //começou a trabalhar de noite e terminou de noite?
        } elseif (($hora_inicial < $inicioPeriodoDiurno or $hora_inicial > $fimPeriodoDiurno) and ($hora_final < $inicioPeriodoDiurno or $hora_final > $fimPeriodoDiurno) and $horas_totais < 720) {
            $periodoDiurnoTrabalhado = 0;
            $periodoNoturnoTrabalhado = $horas_totais;

            //começou a trabalhar de noite e virou até outra noite?
        } elseif (($hora_inicial < $inicioPeriodoDiurno or $hora_inicial > $fimPeriodoDiurno) and ($hora_final < $inicioPeriodoDiurno or $hora_final > $fimPeriodoDiurno) and $horas_totais > 720) {
            $periodoDiurnoTrabalhado = 900;
            $periodoNoturnoTrabalhado = $horas_totais - $periodoDiurnoTrabalhado;
        } else {
            //serve só pra evitar erro caso nenhuma das opções acima englobe tudo, mas caso isso aconteçe, só por mais um elseif aqui
            $periodoDiurnoTrabalhado = 0;
            $periodoNoturnoTrabalhado = 0;
        }

        //periodo diurno trabalhado convertido para horas novamente, eu deveria arredondar os minutos aqui...
        $resultado[1] = gmdate("H:i", $periodoDiurnoTrabalhado * 60);
        //periodo diurno trabalhado convertido para horas novamente, eu deveria arredondar os minutos aqui...
        $resultado[2] = gmdate("H:i", $periodoNoturnoTrabalhado * 60);

        //essa variavel na verdade é um array onde retorna a hora total no índice 0
        //o periodo trabalhado durante o dia no indice 1 e o periodo trabalhado durante a noite no indice 2
        return $resultado;
    }

}
