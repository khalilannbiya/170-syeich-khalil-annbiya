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
        Schema::create('witnesses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_id')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->string('phone', 20)->nullable(false);
            $table->string('address')->nullable(false);
            $table->text('description')->nullable(false);

            $table->foreign('report_id')->references('id')->on('reports')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('witnesses');
    }
};
