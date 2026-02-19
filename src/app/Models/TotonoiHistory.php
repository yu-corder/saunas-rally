<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotonoiHistory extends Model
{
    use HasFactory;

    protected $table = 't_totonoi_histories';

    protected $fillable = [
        'sauna_id',
        'visit_date',
        'comment',
    ];
}
