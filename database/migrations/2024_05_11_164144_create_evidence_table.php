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
        Schema::create('evidences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_id')->nullable(false);
            $table->string('url')->nullable(false);
            $table->string('title', 50)->nullable(false);
            $table->text('description')->nullable();

            $table->foreign('report_id')->references('id')->on('reports')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence');
    }
};
