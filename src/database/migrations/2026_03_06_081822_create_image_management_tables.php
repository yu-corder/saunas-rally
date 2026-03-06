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
        // 1. 一時保存用テーブル（upload_tokenで紐付け）
        Schema::create('tmp_sauna_images', function (Blueprint $table) {
            $table->id();
            $table->string('upload_token')->index()->comment('画面表示時に発行される一時的なキー');
            $table->string('path')->comment('仮保存先のファイルパス');
            $table->timestamps();
        });

        // 2. 本登録用テーブル
        Schema::create('sauna_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sauna_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauna_images');
        Schema::dropIfExists('tmp_sauna_images');
    }
};
