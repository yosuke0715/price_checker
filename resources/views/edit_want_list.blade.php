@extends('layouts.app')

@section('content')
<section class="form">
    <div class="container">
        <form action="{{ asset('/update') }}" method="POST" class="my-4">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">名前</span>
                <input type="text" name="item_name" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" value="{{ $items->item_name }}">
            </div>
            <div class="d-flex row mb-3">
                <div class="d-flex col-6">
                    <span class="input-group-text" id="inputGroup-sizing-default">誰</span>
                    <input type="hidden" name="user_name_id" value="{{ $items->user_name }}" id="user_name_id">
                    <select class="form-select" id="user_name" name="user_name" aria-label="Default select example">
                        @if ($items->user_name == 1)
                        <option value="1" selected>矢野</option>
                        <option value="2">大迫</option>
                        <option value="3">その他</option>
                        @elseif($items->user_name == 2)
                        <option value="1">矢野</option>
                        <option value="2" selected>大迫</option>
                        <option value="3">その他</option>
                        @else
                        <option value="1">矢野</option>
                        <option value="2">大迫</option>
                        <option value="3" selected>その他</option>
                        @endif
                    </select>
                </div>
                <div class="d-flex col-6">
                    <span class="input-group-text" id="inputGroup-sizing-default">優先度</span>
                    <input type="hidden" id="priority_id" name="priority_id" value="{{ $items->priority }}">
                    <select class="form-select" name="priority" aria-label="Default select example">
                        @if ($items->priority == 1)
                        <option value="1" selected>高</option>
                        <option value="2">中</option>
                        <option value="3">低</option>
                        @elseif ($items->priority == 2)
                        <option value="1">高</option>
                        <option value="2" selected>中</option>
                        <option value="3">低</option>
                        @else
                        <option value="1">高</option>
                        <option value="2">中</option>
                        <option value="3" selected>低</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="comment" placeholder="メモがあれば" id="floatingTextarea2"
                    style="height: 100px" value="{{ $items->comment }}"></textarea>
                <label for="floatingTextarea2">メモがあれば</label>
            </div>
            <input type="hidden" name="edit_id" value="{{ $items->id }}">
            <div class="d-grid gap-2 col-8 mx-auto mb-2">
                <input class="btn another" type="submit" value="編集する">
            </div>
        </form>
    </div>
</section>
@endsection