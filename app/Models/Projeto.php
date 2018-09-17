<?php

namespace App\Models;

use Carbon\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;

class Projeto extends Eloquent
{
	protected $casts = [
		'empresa_id' => 'int',
		'progresso' => 'int',
        'data_inicio' => 'date',
        'data_limite' => 'date',
        'prazo_final' => 'date',
        'data_termino' => 'date'
	];

	protected $dates = [
		'data_inicio',
		'data_limite',
		'prazo_final',
		'data_termino'
	];

	protected $fillable = [
		'empresa_id',
		'nome',
		'descricao',
		'progresso',
		'status',
		'data_inicio',
		'data_limite',
		'prazo_final',
		'data_termino'
	];

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class);
	}

	public function apontamentos()
	{
		return $this->hasMany(\App\Models\Apontamento::class);
	}

	public function mifs()
	{
		return $this->hasMany(\App\Models\Mif::class);
	}

    public function getStatus()
    {
        switch ($this->status) {
            case 'aberto':
                return '<span class="label label-primary">Aberto</span>';
                break;
            case 'finalizado':
                return '<span class="label label-success">Finalizado</span>';
                break;
            case 'aguardando':
                return '<span class="label label-warning">Aguardando</span>';
                break;
            case 'cancelado':
                return '<span class="label label-danger">Cancelado</span>';
                break;
        }
	}

    public function getDataInicio()
    {
        return Carbon::parse($this->data_inicio)->format('d/m/Y');
	}

    public function getDataLimite()
    {
        return Carbon::parse($this->data_limite)->format('d/m/Y');
	}

    public function getPrazoFinal()
    {
        return Carbon::parse($this->prazo_final)->format('d/m/Y');
	}

    public function getDataTermino()
    {
        return Carbon::parse($this->data_termino)->format('d/m/Y');
	}
}
