<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'CartId';
    protected $keyType = 'string'; 

    protected $fillable = [
        'CartId', 'CustomerId'
    ];
}
