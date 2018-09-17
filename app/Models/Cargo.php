<?php

namespace App\Models;

use App\User;
use Reliese\Database\Eloquent\Model as Eloquent;

class Cargo extends Eloquent
{
	protected $fillable = [
		'nome'
	];

    public function user()
    {
        return $this->belongsTo(User::class);
	}
}
