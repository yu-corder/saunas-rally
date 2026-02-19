<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sauna;
use App\Models\TotonoiHistory;
use Carbon\Carbon;

class TotonoiHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sauna = Sauna::first(); // とりあえず1件目のサウナに紐付ける

        if ($sauna) {
            TotonoiHistory::create([
                'sauna_id'   => $sauna->id,
                'visit_date' => Carbon::today()->format('Y-m-d'), // 今日
                'comment'    => '最高にととのいました。',
            ]);

            TotonoiHistory::create([
                'sauna_id'   => $sauna->id,
                'visit_date' => Carbon::yesterday()->format('Y-m-d'), // 昨日
                'comment'    => '水風呂がキンキンだった。',
            ]);
        }
    }
}
