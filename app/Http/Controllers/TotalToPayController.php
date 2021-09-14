<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TotalToPayController extends Controller
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

    public function showTotalPay($month){
        
        try {
            $price = \DB::table('price')->where('month', $month)->first();
            $rent = $price->rent;
            $ele = $price->electric_bill;
            $water = $price->water_bill;
            $gas = $price->gas_fee;
            $wifi = $price->wifi_bill;
            $user1 = $price->user1_bill;
            $user2 = $price->user2_bill;
            $sumPrice = number_format(($rent + $ele + $water + $gas - $wifi + $user1 - $user2) / 2);
            return view('total_to_pay')
            ->with('total_price', $sumPrice)
            ->with('month', $month);

        } catch (\Exception $e) {
                report($e);
                session()->flash('flash_message', '更新に失敗しました');
        }
    }

}
