<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('order_number')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('amount_total', 8, 2)->nullable();
            $table->decimal('amount_net', 8, 2)->nullable();
            $table->string('tax_status')->nullable();
            $table->string('shipping_costs')->nullable();
            $table->string('shipping_status')->nullable();
            $table->string('custom_fields', 1000)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
}
