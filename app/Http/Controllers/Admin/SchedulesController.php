<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{
    public function data(){
        $course    = DB::table('offline_courses')->get();
        $schedule  = DB::table('schedules')->paginate(8);
        return view('admin.schedules',['offline' => $course, 'schedule' => $schedule]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $schedule             = new Schedules();
                $schedule->course_id  = $request->title;

                // xử lý ngày tháng
                $today = date('d-m-Y');
                $today = strtotime($today);

                $start_day = strtotime($request->start_day);
                $end_day   = strtotime($request->end_day);
                if ($start_day >= $today && $start_day <= $end_day) {
                    $schedule->start_day  = $start_day;
                    $schedule->end_day    = $end_day;
                }else{
                    return redirect()->back()->with('fail', 'Chọn ngày không phù hợp');
                }

                // xử lý tgian
                $start = strtotime($request->start);
                $end   = strtotime($request->end);
                if ($start < $end) {
                    $schedule->start_time = $start;
                    $schedule->end_time   = $end;
                }else{
                    return redirect()->back()->with('fail', 'Chọn giờ không phù hợp');
                }

                $days                 = implode(",", $request->day); // Thêm vào chuỗi
                $schedule->weekday  = $days;

                $schedule->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm lịch học thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.cakes');
    }
    public function edit(Request $request, $id){
        $schedule = Schedules::find($id);
        if($request->isMethod('post')){
            $schedule->course_id  = $request->title;
            // xử lý ngày tháng
            $today = date('d-m-Y');
            $today = strtotime($today);

            $start_day = strtotime($request->start_day);
            $end_day   = strtotime($request->end_day);
            if ($start_day >= $today && $start_day <= $end_day) {
                $schedule->start_day  = $start_day;
                $schedule->end_day    = $end_day;
            }else{
                return redirect()->back()->with('fail', 'Chọn ngày không phù hợp');
            }

            // xử lý thời gian
            $start = strtotime($request->start);
            $end   = strtotime($request->end);

            if ($start < $end) {
                $schedule->start_time = $start;
                $schedule->end_time   = $end;
            }else{
                return redirect()->back()->with('fail', 'Chọn giờ không phù hợp');
            }

            $days                 = implode(",", $request->day); // Thêm vào chuỗi
            $schedule->weekday  = $days;

            $schedule->save();
            return redirect()->back()->with('status', 'Sửa lịch học thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $schedule = Schedules::find($id);
        $schedule->delete();
        return redirect()->back()->with('status', 'Xóa lịch học thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            Schedules::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
