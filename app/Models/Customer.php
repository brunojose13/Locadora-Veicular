<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'cpf',
        'email',
        'phone_number',
        'date_of_birth',
        'license_time'
    ];

    protected $hidden = [
        'cpf',
        'date_of_birth',
        'license_time'
    ];
}
