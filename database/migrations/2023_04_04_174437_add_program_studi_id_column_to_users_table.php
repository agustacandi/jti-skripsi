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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('program_studi_id')->after('phone_number');
            $table->foreign('program_studi_id')->references('id')->on('program_studis')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'program_studi_id')) {
                $table->dropForeign(['program_studi_id']);
                $table->dropColumn('program_studi_id');
            }
        });
    }
};