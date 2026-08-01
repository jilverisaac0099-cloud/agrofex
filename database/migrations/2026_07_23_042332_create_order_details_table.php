<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount', 45);
            $table->string('price', 45);
            $table->string('subtotal', 45);
            
            $table->integer('product_id')->unsigned();
            $table->foreign("product_id")->references("id")->on("products")->onUpdate("cascade")->onDelete("cascade");

            $table->integer('order_id')->unsigned();
            $table->foreign("order_id")->references("id")->on("orders")->onUpdate("cascade")->onDelete("cascade");
            
            $table->integer('customer_id')->unsigned();
            $table->foreign("customer_id")->references("id")->on("customers")->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
