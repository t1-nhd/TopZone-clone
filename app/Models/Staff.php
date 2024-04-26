<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $primaryKey = 'StaffId';
    protected $keyType = 'string';

    protected $fillable = [
        'StaffId',
        'StaffPositionId',
        'StaffName',
        'Email',
        'Gender',
        'YearOfBirth',
        'Phone',
        'CitizenId',
        'Active'
    ];
}
