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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('t_no')->unique();
            $table->string('t_evid');
            $table->string('t_event');
            $table->date('t_validity');
            $table->string('t_type');
            $table->decimal('t_price', 8, 2);
            $table->integer('t_qty');
            $table->string('t_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
