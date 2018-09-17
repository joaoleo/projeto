<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Mif extends Eloquent
{
	protected $casts = [
		'projeto_id' => 'int',
		'assinado' => 'bool',
		'entregue' => 'bool',
		'easy_project' => 'bool'
	];

	protected $fillable = [
		'projeto_id',
		'nome',
		'assinado',
		'entregue',
		'easy_project'
	];

	public function projeto()
	{
		return $this->belongsTo(\App\Models\Projeto::class);
	}
}
