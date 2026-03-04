<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    use HasFactory;

    // 保存を許可するカラムを指定
    protected $fillable = [
        'name',
        'postcode',
        'prefecture',
        'city',
        'address',
        'sauna_temp',
        'water_temp',
        'has_loyly',
        'description',
    ];

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
