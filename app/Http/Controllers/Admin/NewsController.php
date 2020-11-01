<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function data(){
        $news = DB::table('news')->paginate(15);
        return view('admin.news',['news' => $news]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $news = new News();
                $news->title   = $request->title;
                $news->summary = $request->summary;
                $news->detail  = $request->detail;
                if ($request->hasFile('imgnews')) {
                    foreach($request->file('imgnews') as $img){
                        $destinationPath = 'images/news'.'/';
                        $extension = $img->getClientOriginalExtension(); // lấy đuôi ảnh
                        $fileName = $news->title."-".date('his').".".$extension;
                        $filename = $img->move($destinationPath, $fileName);
                        $news->img = $filename;
                    }
                }
                $news->save();
                DB::commit();
                return redirect('news.add');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect('news.fail');
            }
        }
        return view('admin.news');
    }
    public function edit(Request $request, $id){
        // $db_news = array();
        $news = News::find($id);
        // $db_news['news'] = $news;
        if($request->isMethod('post')){
            $news->title   = $request->title;
            $news->summary = $request->summary;
            $news->detail  = $request->detail;
            if ($request->hasFile('imgnews')) {
                foreach($request->file('imgnews') as $img){
                    $extension = $img->getClientOriginalExtension(); // lấy đuôi ảnh
                    $fileName = $news->title."-".date('his').".".$extension;
                    $destinationPath = 'images/news'.'/';
                    $filename = $img->move($destinationPath, $fileName);
                    $news->img = $filename;
                }
            }

            $news->save();
            return redirect('/news');
        }
        return view('admin.news');
        // return $db_news['news'];
    }
    public function delete($id){
        $news = News::find($id);
        $news->delete();
        return redirect('news');
    }
    public function deleteMul(Request $request)
    {
        $data = $request->all();
        dd($data);
        // foreach ($data['id'] as $id){
        //     DB::table('news')->where('id', $id)->delete();
        // }
    }
}
