<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $primaryKey = 'BillId';
    protected $keyType = 'string'; 

    protected $fillable = [
        'BillId', 
        'CustomerId',
        'created_at',
        'Address',
        'Phone',
        'Status',
        'Note',
        'Shipped'
    ];
}
