<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Cidade extends Eloquent
{
	protected $casts = [
		'estado_id' => 'int'
	];

	protected $fillable = [
		'estado_id',
		'nome'
	];

	public function estado()
	{
		return $this->belongsTo(\App\Models\Estado::class);
	}

	public function empresas()
	{
		return $this->hasMany(\App\Models\Empresa::class);
	}
}
