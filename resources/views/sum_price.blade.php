@extends('layouts.app')

@section('content')
<?php
$sumPrice = $item->rent + $item->gas_fee + $item->water_bill + $item->electric_bill + $item->wifi_bill + $item->user1_bill + $item->user2_bill;
?>
<div class="container" id="sum_price">
    <h2 class="text-center font-weight-bold mt-4">支払額記入</h2>
    <h3 class="text-center font-weight-bold my-3">{{ $item->month }}月分</h3>
    <form action="{{asset('/save_price')}}" method="post" name="price_form" onsubmit="return sumPriceCheck()">
    @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">家賃</span>
            <input name="rent" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" value="{{ $item->rent }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">ガス代</span>
            <input name="gas" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" value="{{ $item->gas_fee }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">水道代</span>
            <input name="water" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" value="{{ $item->water_bill }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">電気代</span>
            <input name="ele" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" value="{{ $item->electric_bill }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">WiFi代</span>
            <input name="wifi" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" value="{{ $item->wifi_bill }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">矢野</span>
            <input name="user1" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" readonly  value="{{ $item->user1_bill }}">
            <span class="en">円</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">大迫</span>
            <input name="user2" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" readonly value="{{ $item->user2_bill }}">
            <span class="en">円</span>
        </div>
        <input type="hidden" name="month" value="{{ $item->month }}">
        <div class="d-grid gap-2 col-8 mx-auto mb-2">
            <input  class="btn another" type="submit" value="保存する">
        </div>
    </form>
    <div class="d-grid gap-2 col-8 mx-auto mb-2">
        <button class="btn another" type="button" id="detail">矢野＆大迫【詳細】</button>
    </div>
    <div class="d-grid gap-2 col-12 mx-auto ">
        <details>
            <summary>他の月を見る</summary>
            <div class="answer d-flex justify-content-between flex-wrap">
                <button class="month_list" onclick="getPriceMonth(8)">8月</button>
                <button class="month_list" onclick="getPriceMonth(9)">9月</button>
                <button class="month_list" onclick="getPriceMonth(10)">10月</button>
                <button class="month_list" onclick="getPriceMonth(11)">11月</button>
                <button class="month_list" onclick="getPriceMonth(12)">12月</button>
                <button class="month_list" onclick="getPriceMonth(1)">1月</button>
                <button class="month_list" onclick="getPriceMonth(2)">2月</button>
                <button class="month_list" onclick="getPriceMonth(3)">3月</button>
            </div>
        </details>
    </div>
</div>
@endsection