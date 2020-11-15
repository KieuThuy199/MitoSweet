<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineCoursesController extends Controller
{
    public function data(){
        $course = DB::table('online_courses')->paginate(5);
        return view('admin.onlinecourses',['course' => $course]);
    }
}
