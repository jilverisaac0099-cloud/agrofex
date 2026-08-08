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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",50)->index();
            $table->string('description',400)->nullable();
            $table->decimal('price', 8,2)->unsigned();
            $table->string('status',20);

            $table->integer('producer_id')->unsigned();
            $table->foreign("producer_id")->references("id")->on("producers")->onUpdate("cascade")->onDelete("cascade");

            $table->integer('category_id')->unsigned();
            $table->foreign("category_id")->references("id")->on("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
