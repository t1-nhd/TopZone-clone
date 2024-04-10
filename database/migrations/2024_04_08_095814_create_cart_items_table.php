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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->string('CartId', 10)->nullable(false);
            $table->string('ProductId', 10)->nullable(false);
            $table->tinyInteger('Quantity')->nullable(false);
            $table->boolean('Paid')->default(false);
            
            $table->primary(['CartId', 'ProductId']);
            $table->foreign('CartId')->references('CartId')->on('carts');
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
        Schema::dropIfExists('cart_items');
    }
};
