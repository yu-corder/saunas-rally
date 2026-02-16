<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "name",
    ];

    // itemテーブルとのリレーション設定
    public function items(): HasMany
    {
        return $this->HasMany(Item::class);
    }
}
