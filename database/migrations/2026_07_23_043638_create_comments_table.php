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
            $table->string('texto');
            $table->string('qualification');

            $table->foreignId("producer_id")->constrained("producers")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("customer_id")->constrained("customers")->onUpdate("cascade")->onDelete("cascade");
        
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
