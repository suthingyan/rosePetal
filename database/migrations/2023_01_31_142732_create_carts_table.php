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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('subCategory')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('productCode')->nullable();
            $table->string('title')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('totalPrice')->nullable();
            $table->string('price')->nullable();
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('size_id');
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
        Schema::dropIfExists('carts');
    }
};
