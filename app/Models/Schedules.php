<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $fillable = [
        'course_id','start_day','end_day','start_time','end_time','weekday',
    ];
}
