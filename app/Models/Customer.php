<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductModelName';

    protected $fillable = [
        'CustomerId',
        'LastName',
        'FirstName',
        'Email',
        'Gender',
        'YearOfBirth',
        'Phone',
        'Address',
        'Active'
    ];
}
