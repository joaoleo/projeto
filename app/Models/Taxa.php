<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Taxa extends Eloquent
{
	protected $casts = [
		'valor' => 'float'
	];

	protected $fillable = [
		'nome',
		'valor'
	];
}
