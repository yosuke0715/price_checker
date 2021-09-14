@extends('layouts.app')

@section('content')
<section class="form">
    <div class="container mt-4">
        <form action="{{ asset('/update_detail'); }}" method="post" name="detail_form" onsubmit="return check()">
            @csrf
            <div class="d-flex row">
                <div class="d-flex col-5" style="padding-right: 0;">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="height: 40px;">誰</span>
                    <select name="user_name" class="form-select" aria-label="Default select example">
                        @if( $item->user_name == 1 )
                            <option value="1" selected>矢野</option>
                            <option value="2">大迫</option>
                        @elseif( $item->user_name == 2 )
                            <option value="1" >矢野</option>
                            <option value="2" selected>大迫</option>
                        @endif
                    </select>
                </div>
                <div class="col-7">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text" id="inputGroup-sizing-default">金額</span>
                        <input name="price" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{ $item->price }}">
                        <span class="en">円</span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">内容</span>
                <input name="comment" type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" value="{{ $item->item_name }}">
            </div>
            <input type="hidden" name="edit_id" value="{{ $item->id }}">
            <input type="hidden" name="month" value="{{ $item->month }}">
            <div class="d-grid gap-2 col-8 mx-auto">
                <input class="btn another" type="submit" value="追加する">
            </div>
        </form>
    </div>
</section>
@endsection