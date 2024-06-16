<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'cpf',
        'phone_number',
        'email',
        'password',
        'last_sign_in'
    ];

    protected $hidden = [
        'cpf',
        'password',
        'last_sign_in'
    ];

    protected $casts = [
        'password' => 'hashed',
        'last_sign_in' => 'datetime'
    ];
}
