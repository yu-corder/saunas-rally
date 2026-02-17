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
        Schema::create('saunas', function (Blueprint $table) {
            $table->id();
            $table->string('name');                      // 施設名

            // 住所関連
            $table->string('postcode', 7)->nullable();   // 郵便番号（ハイフンなし想定）
            $table->string('prefecture');                // 都道府県（東京都、神奈川県など）
            $table->string('city');                      // 市区町村（新宿区、横浜市など）
            $table->string('address');                   // それ以降の住所（番地、建物名）

            // サウナスペック
            $table->integer('sauna_temp')->nullable();   // サウナ温度
            $table->integer('water_temp')->nullable();   // 水風呂温度
            $table->boolean('has_loyly')->default(false); // ロウリュの有無

            // その他
            $table->text('description')->nullable();     // 施設の一言メモ
            $table->timestamps();

            // インデックス（検索スピード向上のため）
            $table->index(['prefecture', 'city']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saunas');
    }
};
