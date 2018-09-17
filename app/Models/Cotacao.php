<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Cotacao extends Eloquent
{
	protected $table = 'cotacoes';

	protected $casts = [
		'empresa_id' => 'int',
		'consultor_id' => 'int'
	];

	protected $dates = [
		'h_consultoria',
		'h_coordenacao',
		'h_translado'
	];

	protected $fillable = [
		'empresa_id',
		'consultor_id',
		'h_consultoria',
		'h_coordenacao',
		'h_translado'
	];

	public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}
