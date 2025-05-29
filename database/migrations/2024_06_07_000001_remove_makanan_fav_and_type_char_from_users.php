<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'makanan_fav')) {
                $table->dropColumn('makanan_fav');
            }
            if (Schema::hasColumn('users', 'type_char')) {
                $table->dropColumn('type_char');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('makanan_fav', 200)->nullable();
            $table->enum('type_char', ['Hero', 'Villain', 'Anti Hero', 'Anti Villain'])->nullable();
        });
    }
}; 