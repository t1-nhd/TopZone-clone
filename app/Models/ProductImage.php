<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductImageId';
    public $incrementing = true;

    protected $fillable = [
        'ProductImageId','ProductImage', 'ProductName'
    ];

    function getProductName() {
        return $this->belongsTo(Product::class, 'ProductId', 'ProductId');
    }
}
