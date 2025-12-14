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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('v_id')->unique();
            $table->string('v_name');
            $table->string('v_location');
            $table->integer('v_capacity');
            $table->string('v_type');
            $table->text('v_facilities');
            $table->string('v_contact');
            $table->boolean('v_avail')->default(true);
            $table->decimal('v_cost', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
