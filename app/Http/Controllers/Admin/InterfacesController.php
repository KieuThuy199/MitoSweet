<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InterfacesController extends Controller
{
    public function data(){
        $page = DB::table('pages')->get();
        return view('admin.pages', ['page' => $page]);
    }
}
