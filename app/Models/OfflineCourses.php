<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfflineCourses extends Model
{
    protected $fillable = [
        'title', 'img', 'summary', 'detail', 'level', 'price', 'promo_price', 'lesson', 'trailer',
    ];
}
