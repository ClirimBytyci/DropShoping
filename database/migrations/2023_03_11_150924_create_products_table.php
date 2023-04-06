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

            $table->foreign('product_media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_media_id']);
        });
        Schema::dropIfExists('products');
    }
}
