<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductID';
    protected $keyType = 'string';

    protected $fillable = [
        'ProductId',
        'ProductName',
        'ProductModelId',
        'Ram',
        'Memory',
        'ShowOnHomePage',
        'ProductThumbnail',
        'UnitPrice',
        'DesignSizeAndWeight',
        'Warranty',
        'Inventory',
        'isNew',
        'MonitorTechnology',
        'Resolution',
        'MonitorSize',
        'CameraBack',
        'CameraFront',
        'Os',
        'Cpu',
        'CpuSpeed',
        'Gpu',
        'Cellular',
        'Sim',
        'Wireless',
        'Port',
        'Jack',
        'BatteryCapacity',
        'BatteryType',
        'BatteryTechnology',
        'NumberOfCore',
        'NumberOfThread',
        'StrapReplaceable',
        'SpecialFeature',
        'ChargerIncluded',
        'MaximumChargable',
        'MaximumRamUpgraded',
        'MaximumCpuSpeed',
        'SportSupport',
        'CallingSupport',
        'MonitorMaterials',
        'BorderMaterials',
        'StrapMaterials',
        'StrapWidth',
        'StrapHeight',
        'WaterResistant',
        'Healthcare',
        'DisplayNotification',
        'ChargingTime',
        'OsConnectable',
        'ManagermentApplication',
        'Sensor',
        'Locater'
    ];
    protected static function boot(){
        parent::boot();
        static::creating(function ($product) {
            $lastProduct = Product::orderBy('ProductId', 'desc')->first();
            if($lastProduct){
                $lastNumber = (int)substr($lastProduct->ProductId,3) + 1;
            }
            else $lastNumber = 1;
            $product->ProductId = "P" . str_pad($lastNumber,9,"0",STR_PAD_LEFT); 
        });
    }

    function getProductModelName() {
        return $this->belongsTo(ProductModel::class,'ProductModelId','ProductModelId');
    }
}
