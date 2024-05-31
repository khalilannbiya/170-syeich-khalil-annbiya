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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable(false);
            $table->unsignedInteger('division_id')->nullable(true);
            $table->string('title', 50)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('location', 100)->nullable(false);
            $table->enum('status', ['diterima', 'ditolak', 'sedang diproses', 'selesai'])->default('diterima')->nullable(false);
            $table->dateTime('time')->nullable(false);
            $table->string('unic_code', 6)->nullable(false);
            $table->boolean('is_private')->default(0)->nullable(false);
            $table->boolean('is_anonymous')->default(0)->nullable(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('division_id')->references('id')->on('divisions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
