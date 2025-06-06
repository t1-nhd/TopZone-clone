<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    use HasFactory;
    protected $primaryKey = ['BillId', 'ProductId'];
    protected $keyType = 'string';

    protected $fillable = [
        'BillId', 
        'ProductId',
        'Quantity',
    ];
}
