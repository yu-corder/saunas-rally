<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TotonoiHistory extends Model
{
    use HasFactory;

    protected $table = 't_totonoi_histories';

    protected $fillable = [
        'sauna_id',
        'visit_date',
        'comment',
    ];

    public function sauna(): BelongsTo
    {
        // 第2引数（外部キー）と第3引数（親の主キー）を明示的に指定するとより確実です
        return $this->belongsTo(Sauna::class, 'sauna_id', 'id');
    }
}
