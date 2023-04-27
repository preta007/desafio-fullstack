<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
	use Notifiable;

    protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'phone' => 'int',
		'zip_code' => 'int',
		'ibge' => 'int',
		'ddd' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'last_name',
		'email',
		'email_verified_at',
		'phone',
		'password',
		'remember_token',
		'zip_code',
		'public_place',
		'complement',
		'district',
		'city',
		'uf',
		'ibge',
		'ddd'
	];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
