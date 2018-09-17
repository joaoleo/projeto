<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Estado extends Eloquent
{
	protected $fillable = [
		'nome',
		'uf'
	];

	public function cidades()
	{
		return $this->hasMany(\App\Models\Cidade::class);
	}

	public function empresas()
	{
		return $this->hasMany(\App\Models\Empresa::class);
	}
}
