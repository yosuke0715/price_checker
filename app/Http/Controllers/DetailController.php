<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
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

    public function showDetailList(){
        $month = date('n');

        try {
            $items = \DB::table('detail')->get();
            return view('detail')
            ->with('items', $items)
            ->with('month', $month);

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新に失敗しました');
        }
    }

    public function addDetailList(Request $request){
        $request->session()->regenerateToken();

        try {
            $items = \DB::table('detail')->insert([
                'user_name' => $request->user_name,
                'price' => $request->price,
                'item_name' => $request->comment,
                'month' => $request->month
            ]);
            return self::saveTotalPrice();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新に失敗しました');
        }
    }

    public function saveTotalPrice(){
        $month = date('n');
        try {
            $sumUser1 = \DB::table('detail')->where('user_name', 1)->sum('price');
            $sumUser2 = \DB::table('detail')->where('user_name', 2)->sum('price');
            $user1Query = \DB::table('price')->where('month', $month)->update([
                'user1_bill' => $sumUser1
            ]);
            $user2Query = \DB::table('price')->where('month', $month)->update([
                'user2_bill' => $sumUser2
            ]);
            return self::showDetailList();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新に失敗しました');
        }
    }

    public function delDetailList(Request $request){
        try {
            $request->session()->regenerateToken();
            $query = \DB::table('detail')->where('id', $request->del_id)->delete();
            return self::showDetailList();
        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }

    public function editDetailList(Request $request){
        $request->session()->regenerateToken();
        try {
            $targetId = $request->edit_id;
            $item = \DB::table('detail')->where('id', $targetId)->first();
            return view('edit_detail')->with('item',$item);

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }

    public function updateDetailList(Request $request){

        $targetId = $request->edit_id;
        try {
            $items = \DB::table('detail')->where('id', $targetId)->update(
                [
                    'user_name' => $request->user_name,
                    'item_name' => $request->comment,
                    'price' => $request->price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
            return self::showDetailList();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新が失敗しました');
        }
    }
    public function showTargetMonth($month){
        $items = \DB::table('detail')->where('month', $month)->get();
        return view('detail')
        ->with('items', $items)
        ->with('month', $month);
        
    }
}