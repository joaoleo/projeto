<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Cotacao extends Eloquent
{
    protected $table = 'cotacoes';

    protected $casts = [
        'empresa_id' => 'int',
        'consultor_id' => 'int',
        'h_consultoria' => 'int',
        'f_consultoria' => 'float',
        'consultor_taxa' => 'int',
        'coordenador_id' => 'int',
        'h_coordenacao' => 'int',
        'f_coordenacao' => 'float',
        'coordenador_taxa' => 'int',
        'viajante_id' => 'int',
        'h_translado' => 'int',
        'f_translado' => 'float',
        'translado_taxa' => 'int',
        'total_simposto' => 'float'
    ];

    protected $fillable = [
        'empresa_id',
        'consultor_id',
        'h_consultoria',
        'f_consultoria',
        'consultor_taxa',
        'coordenador_id',
        'h_coordenacao',
        'f_coordenacao',
        'coordenador_taxa',
        'viajante_id',
        'h_translado',
        'f_translado',
        'translado_taxa',
        'status',
        'total_simposto'
    ];

//    public function user()
//    {
//        return $this->belongsTo(\App\User::class, 'viajante_id');
//    }

//    public function taxa()
//    {
//        return $this->belongsTo(\App\Models\Taxa::class, 'translado_taxa');
//    }

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'aberto':
                return '<span class="label label-primary">Aberto</span>';
                break;
            case 'aprovado':
                return '<span class="label label-success">Aprovado</span>';
                break;
            case 'aguardando':
                return '<span class="label label-warning">Aguardando</span>';
                break;
            case 'cancelado':
                return '<span class="label label-danger">Cancelado</span>';
                break;
        }
    }

    public function totalSemImposto()
    {
        return number_format($this->total_simposto, 2, ',', '.');
    }

    public function totalComImposto()
    {
        $total = $this->total_simposto / 0.8632;
        return number_format($total, 2, ',', '.');
    }

}
