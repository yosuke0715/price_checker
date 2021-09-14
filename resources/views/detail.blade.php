@extends('layouts.app')

@section('content')
<?php 
$nowMonth = date('n');
?>
<section class="list">
    <div class="container">
        <h2 class="section_title text-center mt-3">支払い詳細</h2>
        <p class="month text-center font-weight-bold">{{ $month }}月分</p>
        @if($nowMonth == $month)
        <form action="{{ asset('/add_detail'); }}" method="post" name="detail_form" onsubmit="return check()">
            @csrf
            <div class="d-flex row">
                <div class="d-flex col-5" style="padding-right: 0;">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="height: 40px;">誰</span>
                    <select name="user_name" class="form-select" aria-label="Default select example">
                        <option value="1" selected>矢野</option>
                        <option value="2">大迫</option>
                    </select>
                </div>
                <div class="col-7">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text" id="inputGroup-sizing-default">金額</span>
                        <input name="price" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                        <span class="en">円</span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="month" value="{{ $month }}">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">内容</span>
                <input name="comment" type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="d-grid gap-2 col-8 mx-auto">
                <input class="btn another" type="submit" value="追加する">
            </div>
        </form>
        @endif

        <div class="list_area">
            @foreach($items as $item)
            <div class="list_item py-3 px-3 my-3 position-relative">
                <h3>
                    @if($item->user_name == 1)
                    <span>矢野</span>
                    @elseif($item->user_name == 2)
                    <span>大迫</span>
                    @endif
                    ：
                    {{ $item->price }}
                </h3>
                <h4 class="text-center mt-4">{{ $item->item_name }}</h4>
                <form action="{{ asset('/detail_del'); }}" method="post" class="del_btn position-absolute top-0 end-0">
                    @csrf
                    <input type="hidden" name="del_id" value="{{ $item->id }}">
                    <input type="submit" value="×" id="del_btn">
                </form>
                <form action="{{ asset('/detail_edit'); }}" method="post" class="edit_btn position-absolute ">
                    @csrf
                    <input type="hidden" name="edit_id" value="{{ $item->id }}">
                    <input type="submit" value="編集">
                </form>
            </div>
            @endforeach
            <div class="d-grid gap-2 col-12 mx-auto mt-4">
                <details>
                    <summary>他の月を見る</summary>
                    <div class="answer d-flex justify-content-between flex-wrap">
                        <button class="month_list" onclick="getDetailMonth(8)">8月</button>
                        <button class="month_list" onclick="getDetailMonth(9)">9月</button>
                        <button class="month_list" onclick="getDetailMonth(10)">10月</button>
                        <button class="month_list" onclick="getDetailMonth(11)">11月</button>
                        <button class="month_list" onclick="getDetailMonth(12)">12月</button>
                        <button class="month_list" onclick="getDetailMonth(1)">1月</button>
                        <button class="month_list" onclick="getDetailMonth(2)">2月</button>
                        <button class="month_list" onclick="getDetailMonth(3)">3月</button>
                    </div>
                </details>
            </div>
        </div>
    </div>
</section>
@endsection