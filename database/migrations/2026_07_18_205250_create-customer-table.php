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
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string("name",50)->index();
            $table->string("last_name",45);
            $table->string('telephone',45)->unique();
            $table->string('email',100)->unique();
            $table->string('gender',20);
            $table->string('registration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
