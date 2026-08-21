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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('qualification');

            $table->integer('product_id')->unsigned();
            $table->foreign("product_id")->references("id")->on("product")->onUpdate("cascade")->onDelete("cascade");

            $table->integer('producer_id')->unsigned();
            $table->foreign("producer_id")->references("id")->on("producers")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('comments');
    }
};
