<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sauna;

class SaunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sauna::create([
            'name' => 'テストサウナ・しらかば',
            'postcode' => '1600022',
            'prefecture' => '東京都',
            'city' => '新宿区',
            'address' => '新宿1-2-3',
            'sauna_temp' => 90,
            'water_temp' => 15,
            'has_loyly' => true,
            'description' => 'セルフロウリュが楽しめるテスト用の架空施設です。',
        ]);
    }
}
