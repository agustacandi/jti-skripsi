<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->string('judul_1');
            $table->text('deskripsi_1');
            $table->string('output_1');
            $table->string('judul_2');
            $table->text('deskripsi_2');
            $table->string('output_2');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('pembimbing_1');
            $table->foreign('pembimbing_1')->references('id')->on('dosens')->onDelete('restrict');
            $table->unsignedBigInteger('pembimbing_2');
            $table->foreign('pembimbing_2')->references('id')->on('dosens')->onDelete('restrict');
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
