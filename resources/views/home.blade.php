@extends('layouts.app')

@section('content')
<?php
$user_name = Auth::user()->name;
?>
<section class="form">
    <div class="container">
        <form action="{{ asset('/add_want_list') }}" method="POST" class="my-4" name="home_form" onsubmit="return homeCheck()">
        @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">名前</span>
                <input type="text" name="item_name" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="d-flex row mb-3">
                <div class="d-flex col-6">
                    <span class="input-group-text" id="inputGroup-sizing-default">誰</span>
                    <select class="form-select" name="user_name" aria-label="Default select example">
                        @if($user_name == "yano")
                        <option value="1" selected>矢野</option>
                        <option value="2">大迫</option>
                        <option value="3">その他</option>
                        @elseif($user_name == "osako")
                        <option value="1" >矢野</option>
                        <option value="2" selected>大迫</option>
                        <option value="3">その他</option>
                        @else
                        <option value="1" >矢野</option>
                        <option value="2">大迫</option>
                        <option value="3" selected>その他</option>
                        @endif
                    </select>
                </div>
                <div class="d-flex col-6">
                    <span class="input-group-text" id="inputGroup-sizing-default">優先度</span>
                    <select class="form-select" name="priority" aria-label="Default select example">
                        <option value="1" selected>高</option>
                        <option value="2">中</option>
                        <option value="3">低</option>
                    </select>
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="comment" placeholder="メモがあれば" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">メモがあれば</label>
            </div>
            <div class="d-grid gap-2 col-8 mx-auto mb-2">
                <input class="btn another" type="submit" value="追加する">
            </div>
        </form>
    </div>
</section>
<section class="list">
    <div class="container">
        @if(!empty($items))
            <h2 class="section_title text-center font-weight-bold my-4">欲しいものリスト</h2>
        @endif
        <div class="list_area">
        @foreach ($items as $item)
            <div class="list_item py-4 px-4 my-4 position-relative">
                <p class="font-weight-bold">
                    @if($item->user_name == 1) 
                        <span>矢野</span>
                    @elseif($item->user_name == 2)
                        <span>大迫</span>
                    @elseif($item->user_name == 2)
                        <span>その他</span>
                    @endif
                    ：
                    @if($item->priority == 1) 
                        <span>高</span>
                    @elseif($item->priority == 2)
                        <span>中</span>
                    @elseif($item->priority == 3)
                        <span>低</span>
                    @endif
                </p>
                <h3 class="item_name">{{ $item->item_name }}</h3>
                <p>{{ $item->comment }}</p>
                <form action="{{ asset('/want_list_del')}}" method="post" class="del_btn position-absolute top-0 end-0">
                @csrf
                    <input type="hidden" name="del_id" value="{{ $item->id }}">
                    <input id="del_btn" type="submit" value="×">
                </form>
                <form action="{{ asset('/want_list_edit')}}" method="post" class="edit_btn position-absolute ">
                @csrf
                    <input type="hidden" name="edit_id" value="{{ $item->id }}">
                    <input type="submit" value="編集">
                </form>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection