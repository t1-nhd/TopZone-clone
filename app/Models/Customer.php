<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'CustomerId';
    protected $keyType = 'string';

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

    protected static function boot(){
        parent::boot();
        static::creating(function ($customer) {
            $lastCustomer = Customer::orderBy('CustomerId', 'desc')->first();
            if($lastCustomer){
                $lastNumber = (int)substr($lastCustomer->CustomerId,3) + 1;
            }
            else $lastNumber = 1;
            $customer->CustomerId = "C" . str_pad($lastNumber,9,"0",STR_PAD_LEFT); 
        });
    }
}
