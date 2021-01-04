<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recode extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'recodes';

    // 可変項目
    protected $fillable = [
        'date',
        'place',
        'weather',
        'tide',
        'temperature',
        'length',
        'comment'
    ];
}