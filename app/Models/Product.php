<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductId';

    protected $fillable = [
        'ProductId',
        'ProductName',
        'ProductModelName',
        'Ram',
        'Memory',
        'ProductThumbnail',
        'UnitPrice',
        'DesignSizeAndWeight',
        'Warrenty',
        'Inventory',
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
        'PerformanceCharger',
        'MaximumRamUpgraded',
        'WebCam',
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
}
