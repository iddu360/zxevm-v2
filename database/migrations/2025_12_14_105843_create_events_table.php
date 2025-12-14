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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('ev_name');
            $table->string('ev_id')->unique();
            $table->date('ev_date0');
            $table->date('ev_date1');
            $table->string('ev_venue');
            $table->text('ev_desc');
            $table->string('ev_organiser');
            $table->string('ev_type');
            $table->string('ev_user');
            $table->integer('ev_capacity');
            $table->string('ev_status')->default('active');
            $table->decimal('ev_entrance', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
