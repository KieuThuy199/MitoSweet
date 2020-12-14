<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLevels;
use App\Models\OfflineCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfflineCoursesController extends Controller
{
    public function data(){
        $course = DB::table('offline_courses')->orderByDesc('id')->paginate(5);
        $level  = DB::table('course_levels')->get();
        return view('admin.offlinecourses',['offline' => $course, 'level' => $level]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $course              = new OfflineCourses();

                $db  = [];
                $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
                // bỏ local ở từng tp của mảng
                for ($i=0; $i < count($db); $i++) {
                    $db[$i] = str_replace('http://localhost','', $db[$i]);
                }
                $img = implode(',', $db); // lưu về dạng mảng

                $course->img         = $img;
                $course->title       = $request->title;
                $course->summary     = $request->summary;
                $course->detail      = $request->detail;
                // $levels              = CourseLevels::select('id')->where('title', $request->level)->first();
                $course->level       = $request->level;
                $course->price       = $request->price;
                $course->promo_price = $request->promo;
                $course->lesson      = $request->lesson;
                $course->trailer     = $request->trailer;

                $course->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm khóa học thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.offlinecourses');
    }
    public function edit(Request $request, $id){
        $course = OfflineCourses::find($id);
        if($request->isMethod('post')){
            $db  = [];
            $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
            // bỏ local ở từng tp của mảng
            for ($i=0; $i < count($db); $i++) {
                $db[$i] = str_replace('http://localhost','', $db[$i]);
            }
            $img = implode(',', $db); // lưu về dạng mảng

            $course->img         = $img;
            $course->title       = $request->title;
            $course->summary     = $request->summary;
            $course->detail      = $request->detail;
            // $levels              = CourseLevels::select('id')->where('title', $request->level)->first();
            $course->level       = $request->level;
            $course->price       = $request->price;
            $course->promo_price = $request->promo;
            $course->lesson      = $request->lesson;
            $course->trailer     = $request->trailer;
            $course->save();
            return redirect()->back()->with('status', 'Sửa khóa học thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $course = OfflineCourses::find($id);
        $course->delete();
        return redirect()->back()->with('status', 'Xóa khóa học thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            OfflineCourses::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
