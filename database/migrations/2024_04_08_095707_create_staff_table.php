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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('StaffId', 10)->primary();
            $table->string('StaffPositionId', 5)->nullable(false);
            $table->string('StaffName', 255)->nullable(false);
            $table->string('Email')->nullable(false)->unique();
            $table->boolean('Gender')->nullable(false);
            $table->string('YearOfBirth', 4)->nullable(false);
            $table->string('Phone', 10)->nullable(false);
            $table->string('CitizenId', 12)->nullable(false)->unique();
            $table->boolean('Active')->default(true);
            
            $table->foreign('StaffPositionId')->references('StaffPositionId')->on('staff_positions');
            $table->foreign('Email')->references('email')->on('users');
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
        Schema::dropIfExists('staff');
    }
};
