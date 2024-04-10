<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPosition extends Model
{
    use HasFactory;
    protected $primaryKey = 'StaffPositionId';
    
    protected $fillable = [
        'StaffPositionId', 'StaffPositionName', 'BasicSalary'
    ];
}
