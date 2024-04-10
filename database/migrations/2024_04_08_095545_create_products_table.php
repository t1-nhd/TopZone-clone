<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('ProductId', 10)->primary();
            $table->string('ProductModelName', 50)->nullable(false);
            $table->string('ProductName')->nullable(false);
            $table->string('ProductThumbnail')->nullable(false);
            $table->string('Memory')->nullable(false);
            $table->string('Ram')->nullable();
            $table->integer('UnitPrice')->nullable(false);
            $table->string('DesignSizeAndWeight')->nullable(false);
            $table->string('Warrenty')->nullable(false);
            $table->integer('Inventory')->nullable(false);
            $table->boolean('isNew')->default(true);
            
            // iPhone fields
            $table->string('MonitorTechnology')->nullable();
            $table->string('Resolution')->nullable();
            $table->string('MonitorSize')->nullable();
            $table->string('CameraBack')->nullable();
            $table->string('CameraFront')->nullable();
            $table->string('Os')->nullable();
            $table->string('Cpu')->nullable();
            $table->string('CpuSpeed')->nullable();
            $table->string('Gpu')->nullable();
            $table->string('Cellular')->nullable();
            $table->string('Sim')->nullable();
            $table->string('Wireless')->nullable();
            $table->string('Port')->nullable();
            $table->string('Jack')->nullable();
            $table->string('BatteryCapacity')->nullable();
            $table->string('BatteryType')->nullable();
            $table->string('BatteryTechnology')->nullable();
            
            // iPad fields
            $table->string('SpecialFeature')->nullable();
            $table->string('ChargerIncluded')->nullable();
            $table->string('MaximumChargable')->nullable();
            
            // Mac fields
            $table->string('PerformanceCharger')->nullable();
            $table->string('MaximumRamUpgraded')->nullable();
            $table->string('WebCam')->nullable();
            $table->tinyInteger('NumberOfCore')->nullable();
            $table->tinyInteger('NumberOfThread')->nullable();
            $table->string('MaximumCpuSpeed')->nullable();
            
            // Watch fields
            $table->string('SportSupport')->nullable();
            $table->string('CallingSupport')->nullable();
            $table->string('MonitorMaterials')->nullable();
            $table->string('BorderMaterials')->nullable();
            $table->string('StrapMaterials')->nullable();
            $table->string('StrapWidth')->nullable();
            $table->string('StrapHeight')->nullable();
            $table->boolean('StrapReplaceable')->nullable();
            $table->string('WaterResistant')->nullable();
            $table->string('Healthcare')->nullable();
            $table->string('DisplayNotification')->nullable();
            $table->string('ChargingTime')->nullable();
            $table->string('OsConnectable')->nullable();
            $table->string('ManagermentApplication')->nullable();
            $table->string('Sensor')->nullable();
            $table->string('Locater')->nullable();
            
            $table->foreign('ProductModelName')->references('ProductModelName')->on('product_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
