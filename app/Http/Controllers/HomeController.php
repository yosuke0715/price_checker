<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showWantList()
    {
        $items = \DB::table('want_list')->get();
        return view('home')
        ->with('items', $items);
    }

    public function addWantList(Request $request){
        
        $request->session()->regenerateToken();
        try {
            \DB::table('want_list')->insert([
                'user_name' => $request->user_name,
                'item_name' => $request->item_name,
                'priority' => $request->priority,
                'comment' => $request->comment,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return self::showWantList();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
        
    }

    public function delWantList(Request $request){
        try {
            $request->session()->regenerateToken();
            $query = \DB::table('want_list')->where('id', $request->del_id)->delete();
            return self::showWantList();
        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }

    public function editWantList(Request $request){
        $request->session()->regenerateToken();
        try {
            $targetId = $request->edit_id;
            $items = \DB::table('want_list')->where('id', $targetId)->first();
            return view('edit_want_list')->with('items',$items);

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }

    public function updateWantList(Request $request){

        $targetId = $request->edit_id;
        try {
            $items = \DB::table('want_list')->where('id', $targetId)->update(
                [
                    'user_name' => $request->user_name,
                    'item_name' => $request->item_name,
                    'priority' => $request->priority,
                    'comment' => $request->comment,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
            return self::showWantList();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }
}