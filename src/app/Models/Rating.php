<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'sauna_id',
        'cost_performance',
        'accessibility',
        'comfortability',
        'totonoi_score',
        'total_score',
    ];

    protected static function booted()
    {
        static::saving(function ($rating) {
            // 各項目の平均値を算出（4項目）
            $sum = $rating->cost_performance
                + $rating->accessibility
                + $rating->comfortability
                + $rating->totonoi_score;

            $rating->total_score = $sum / 4;
        });
    }

    public function sauna()
    {
        return $this->belongsTo(Sauna::class);
    }
}
