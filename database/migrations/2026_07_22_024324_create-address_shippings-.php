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
            Schema::create('address_shippings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('department', 45);
                $table->string('municipality', 45);
                $table->string('exempt_address', 45 );

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
        Schema::dropIfExists('address_shippings');
    }
};
