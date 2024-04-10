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
        Schema::create('staff_positions', function (Blueprint $table) {
            $table->string('StaffPositionId', 5)->primary();
            $table->enum('StaffPositionName', ['Nhân viên bán hàng', 'Bảo vệ', 'Quản lý', 'Nhân viên kỹ thuật', 'Kế toán'])->nullable(false);
            $table->integer('BasicSalary')->nullable(false);
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
        Schema::dropIfExists('staff_positions');
    }
};
