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
            $table->id('product_id');
            $table->string('subCategory')->nullable();
            $table->string('productCode')->unique();
            $table->string('title')->nulable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default(0)->comment('0=pending, 1=featured, 2=popular');
            $table->integer('category_id');
            $table->integer('sub_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('product_colors_id');
            // $table->foreign(column:'category_id')->constrained(table:'categories',column:'category_id');
            // $table->unsignedBigInteger('category_id');
            // $table->foreignId(columns:'category_id')->references(columns:'category_id')->on(table:'categories');
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
