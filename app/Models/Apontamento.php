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
}
