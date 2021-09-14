<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumPriceController extends Controller
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

    
    public function showSumPrice(){
        $nowMonth = date('n');
        $item = \DB::table('price')->where('month', $nowMonth)->first();
        return view('sum_price')
        ->with('item', $item);
    }

    public function saveSumPrice(Request $request){

        $request->session()->regenerateToken();
        $targetMonth = $request->month;
        try {
            \DB::table('price')->where('month', $targetMonth)->update([
                'rent' => $request->rent,
                'electric_bill' => $request->ele,
                'water_bill' => $request->water,
                'gas_fee' => $request->gas,
                'wifi_bill' => $request->wifi,
                'user1_bill' => $request->user1,
                'user2_bill' => $request->user2,
                'month' => $request->month,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return self::showSumPrice();

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新に失敗しました');
        }
    }

    public function showTargetMonth($month){
        $item = \DB::table('price')->where('month', $month)->first();
        return view('sum_price')
        ->with('item', $item);
    }
}
