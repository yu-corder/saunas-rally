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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sauna_id')->constrained()->onDelete('cascade');

            // 各評価項目（1〜5段階を想定）
            $table->unsignedTinyInteger('cost_performance')->default(3)->comment('コスパ');
            $table->unsignedTinyInteger('accessibility')->default(3)->comment('アクセスのしやすさ');
            $table->unsignedTinyInteger('comfortability')->default(3)->comment('快適度（混雑しにくさ）');
            $table->unsignedTinyInteger('totonoi_score')->default(3)->comment('ととのい度');

            // 総合値（平均値などを小数点込みで保持。例: 4.25）
            $table->decimal('total_score', 3, 2)->default(3.00)->comment('総合評価値');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
