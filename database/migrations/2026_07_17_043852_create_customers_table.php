<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 50);
            $table->string('last_name', 45);
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100);
            $table->string('gender', 20);
            $table->date('birth_date')->nullable();
            $table->date('registration_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
