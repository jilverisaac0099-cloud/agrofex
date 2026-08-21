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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department', 45);
            $table->string('municipality', 45);
            $table->string('exempt_address', 45 );

            $table->integer('producer_id')->unsigned();
            $table->foreign("producer_id")->references("id")->on("producers")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('shipping_addresses');
    }
};
