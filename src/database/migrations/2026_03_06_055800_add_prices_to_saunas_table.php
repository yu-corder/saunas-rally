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
        Schema::table('saunas', function (Blueprint $table) {
            $table->unsignedInteger('price')->nullable()->after('address')->comment('平日料金');
            $table->unsignedInteger('weekend_price')->nullable()->after('price')->comment('休日料金');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saunas', function (Blueprint $table) {
            $table->dropColumn(['price', 'weekend_price']);
        });
    }
};
