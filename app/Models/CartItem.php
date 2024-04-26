<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $primaryKey = ['CartId', 'ProductId'];
    protected $keyType = 'string'; 

    protected $fillable = [
        'CartId', 
        'ProductId',
        'Quantity',
        'Paid'
    ];
}
