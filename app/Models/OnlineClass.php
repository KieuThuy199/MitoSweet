<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    protected $fillable = [
        'title', 'img', 'summary', 'detail', 'level', 'price', 'promo_price', 'tag', 'lesson', 'trailer', 'video',
    ];
}
