<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function data(){
        $page      = DB::table('pages')->get();
        $interface = DB::table('interfaces')->where('pages_id', 1)->get();
        // $online    = DB::table('interfaces')->where([['pages_id', 1],['item_id', 'like', 'online%']])->get();
        return view('user.index', ['page' => $page, 'interface' => $interface]);
    }
    public function offline(){
        $interface = DB::table('interfaces')->where('pages_id', 3)->get();
        $level     = DB::table('course_levels')->get();
        $off       = DB::table('offline_courses')->orderByDesc('id')->paginate(9);
        return view('user.offlineclass', ['interface' => $interface, 'level' => $level, 'offline' => $off]);
    }
    public function offdetail($id){
        // $interface = DB::table('interfaces')->where('pages_id', 3)->get();
        $level     = DB::table('course_levels')->get();
        $off       = DB::table('offline_courses')->where('id', $id)->get();
        return view('user.offlineclassdetail', ['level' => $level, 'offline' => $off]);
    }
}
