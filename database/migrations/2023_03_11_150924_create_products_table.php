<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name')->nullable();
            $table->string('product_number')->nullable();
            $table->uuid('category_id')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('stock', 8, 2)->nullable();
            $table->boolean('active')->default(0);
            $table->uuid('parent_id')->nullable();
            $table->string('tax_status')->nullable();
            $table->uuid('product_manufacturer_id')->nullable();
            $table->uuid('product_media_id')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('custom_fields', 1000)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
}
