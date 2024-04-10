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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('CustomerId', 10)->primary();
            $table->string('LastName', 255)->nullable(false);
            $table->string('FirstName', 255)->nullable(false);
            $table->string('Email')->nullable(false)->unique();
            $table->boolean('Gender')->nullable(false);
            $table->string('YearOfBirth', 255)->nullable(false);
            $table->string('Phone', 10)->nullable(false);
            $table->string('Address', 255)->nullable(false);
            $table->boolean('Active')->default(true);

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
        Schema::dropIfExists('customers');
    }
};
