<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('location')->nullable()->after('address');
            $table->string('hours')->nullable()->after('location');
            $table->string('phone')->nullable()->after('hours');
            $table->string('best_for')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn(['location', 'hours', 'phone', 'best_for']);
        });
    }
};