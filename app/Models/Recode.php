<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recode extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'recodes';

    protected $dates = ['date'];

    // 可変項目
    protected $fillable = [
        'user',
        'date',
        'place',
        'weather',
        'tide',
        'temperature',
        'fish',
        'length',
        'comment'
    ];
}