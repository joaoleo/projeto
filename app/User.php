<?php

namespace App;

use App\Models\Cargo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'pj' => 'float',
        'clt' => 'float',
        'vt' => 'float',
        'va' => 'float',
        'vr' => 'float',
        'plano_saude' => 'float',
        'seguro_vida' => 'float',
        'full_premiacao' => 'float',
        'premiacao_trimestral' => 'float',
        'celular' => 'float'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'pj',
        'clt',
        'vt',
        'va',
        'vr',
        'plano_saude',
        'seguro_vida',
        'full_premiacao',
        'premiacao_trimestral',
        'celular',
        'remember_token'
    ];

    public function apontamentos()
    {
        return $this->hasMany(\App\Models\Apontamento::class, 'consultor_id');
    }

    public function cargo()
    {
        return $this->hasOne(Cargo::class, 'id', 'cargo_id');
    }
}
