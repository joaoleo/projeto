<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Empresa extends Eloquent
{
	protected $casts = [
		'estado_id' => 'int',
	];

	protected $fillable = [
		'estado_id',
		'cidade',
		'nome',
		'endereco',
		'cep',
		'telefone',
		'observacao'
	];

	public function estado()
	{
		return $this->belongsTo(\App\Models\Estado::class);
	}

	public function apontamentos()
	{
		return $this->hasMany(\App\Models\Apontamento::class);
	}

	public function projetos()
	{
		return $this->hasMany(\App\Models\Projeto::class);
	}

    public function cotacoes()
    {
        return $this->hasMany(\App\Models\Empresa::class);
	}
}
