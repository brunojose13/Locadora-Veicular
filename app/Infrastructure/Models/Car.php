<?php

namespace App\Infrastructure\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'age',
        'price'
    ];

    protected static function newFactory()
    {
        return CarFactory::new();
    }
}
