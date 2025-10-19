<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "name",
        "price",
        "category_id",
    ];

    // categoryテーブルとのリレーション設定
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
