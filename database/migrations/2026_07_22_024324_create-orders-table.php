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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_time', 45);
            $table->string('subtotal', 45);
            $table->string('status', 45 );
            $table->string('total');

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign("customer_id")->references("id")->on("customers")->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
