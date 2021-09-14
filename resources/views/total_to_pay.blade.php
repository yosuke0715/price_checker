@extends('layouts.app')

@section('content')
<section class="list">
    <div class="container">
        <h2 class="section_title text-center my-4">支払い総額【大迫→矢野】</h2>
        <div class="pay_area py-3">
            <h3 class="text-center font-weight-bold">{{ $month }}月分</h3>
            <p class="sum_price text-center font-weight-bold">{{ $total_price }}円</p>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto mt-4">
            <details>
                <summary>他の月を見る</summary>
                <div class="answer d-flex justify-content-between flex-wrap">
                    <button class="month_list" onclick="getSumPriceMonth(8)">8月</button>
                    <button class="month_list" onclick="getSumPriceMonth(9)">9月</button>
                    <button class="month_list" onclick="getSumPriceMonth(10)">10月</button>
                    <button class="month_list" onclick="getSumPriceMonth(11)">11月</button>
                    <button class="month_list" onclick="getSumPriceMonth(12)">12月</button>
                    <button class="month_list" onclick="getSumPriceMonth(1)">1月</button>
                    <button class="month_list" onclick="getSumPriceMonth(2)">2月</button>
                    <button class="month_list" onclick="getSumPriceMonth(3)">3月</button>
                </div>
            </details>
        </div>
    </div>
</section>
@endsection