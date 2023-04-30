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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('subCategory')->nullable();
            $table->string('productCode')->nullable();
            $table->string('title')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('totalPrice')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->integer('product_id');
            
            // $table->foreignId(column:'product_id')->constrained(table:'products',column:'product_id');
            // $table->unsignedBigInteger('product_id');
            // $table->foreign(columns:'product_id')->references(columns:'product_id')->on(table:'products');
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
        Schema::dropIfExists('orders');
    }
};
