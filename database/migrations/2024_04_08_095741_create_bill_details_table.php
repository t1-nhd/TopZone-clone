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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->string('BillId', 10)->nullable(false);
            $table->string('ProductId', 10)->nullable(false);
            $table->tinyInteger('Quantity')->nullable(false);
            
            $table->primary(['BillId', 'ProductId']);
            $table->foreign('BillId')->references('BillId')->on('bills');
            $table->foreign('ProductId')->references('ProductId')->on('products');
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
        Schema::dropIfExists('bill_details');
    }
};
