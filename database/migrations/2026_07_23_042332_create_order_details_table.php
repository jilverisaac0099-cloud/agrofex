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

            $table->foreignId("order_id")->constrained("orders")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("customer_id")->constrained("customers")->onUpdate("cascade")->onDelete("cascade");
        
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
