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
        // 2. テーブル作成
        Schema::create('t_totonoi_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sauna_id')->constrained('saunas')->onDelete('cascade');
            $table->date('visit_date');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('T_totonoi_histories');
    }
};
