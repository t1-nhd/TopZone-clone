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
        Schema::create('bills', function (Blueprint $table) {
            $table->string('BillId', 10)->primary();
            $table->string('CustomerId', 10)->nullable(false);
            $table->string('Address', 255)->nullable(false);
            $table->string('Phone', 10)->nullable(false);
            $table->string('Note', 1000)->nullable(true);
            $table->enum('Status', ['Pending', 'Approve', 'Reject', 'Cancel', 'Done', 'Shipping'])->default('Pending');
            $table->integer('TotalBill')->nullable(false);
            
            $table->foreign('CustomerId')->references('CustomerId')->on('customers');
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
        Schema::dropIfExists('bills');
    }
};
