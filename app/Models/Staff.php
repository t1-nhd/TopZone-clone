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

    protected static function boot(){
        parent::boot();
        static::creating(function ($staff) {
            $lastStaff = Staff::orderBy('StaffId', 'desc')->first();
            if($lastStaff){
                $lastNumber = (int)substr($lastStaff->StaffId,3) + 1;
            }
            else $lastNumber = 1;
            $staff->StaffId = "S" . str_pad($lastNumber,9,"0",STR_PAD_LEFT); 
        });
    }

    function getStaffPositionName() {
        return $this->belongsTo(StaffPosition::class,'StaffPositionId','StaffPositionId');
    }
}
