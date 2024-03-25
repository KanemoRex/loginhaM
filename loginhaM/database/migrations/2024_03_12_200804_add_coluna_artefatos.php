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
        Schema::disableForeignKeyConstraints();

        Schema::table('artefatos', function (Blueprint $table) {
           $table->foreignId('tipo_id')->nullable()
            ->constrained('tipos')->after('id');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artefatos', function (Blueprint $table) {
            $table->dropForeign(['tipo_id']);
            $table->dropColumn('tipo_id');
        });
    }
};
