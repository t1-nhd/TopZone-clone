<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductModelId';

    protected $fillable = [
        'ProductModelId',
        'ProductModelName', 
        'ProductTypeId'
    ];

    function getProductTypeName() {
        return $this->belongsTo(ProductType::class, 'ProductTypeId', 'ProductTypeId');
    }
}
