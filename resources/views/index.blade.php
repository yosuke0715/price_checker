@extends('layouts.app')

@section('content')
<main>
        <section class="form">
            <div class="container">
                <form action="" class="my-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">名前</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="d-flex row mb-3">
                        <div class="d-flex col-6">
                            <span class="input-group-text" id="inputGroup-sizing-default">誰</span>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1" selected>矢野</option>
                                <option value="2">大迫</option>
                                <option value="3">その他</option>
                            </select>
                        </div>
                        <div class="d-flex col-6">
                            <span class="input-group-text" id="inputGroup-sizing-default">優先度</span>
                            <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>高</option>
                                    <option value="2">中</option>
                                    <option value="3">低</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="メモがあれば" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">メモがあれば</label>
                    </div>
                </form>
                <h2 class="section_title text-center font-weight-bold my-4">欲しいものリスト</h2>
            </div>
        </section>
        <section class="list">
            <div class="container">
                <div class="list_area">
                    <div class="list_item py-4 px-4 my-4 position-relative">
                        <p class="font-weight-bold">矢野：高</p>
                        <h3 class="item_name">大根と玉ねぎ</h3>
                        <p>コメントがあればここに入りますコメントがあればここに入りますコメントがあればここに入ります</p>
                        <form action="" method="post" class="del_btn position-absolute top-0 end-0">
                            <input type="button" value="×">
                        </form>
                        <form action="" method="post" class="edit_btn position-absolute ">
                            <input type="button" value="編集">
                        </form>
                    </div>
                    <div class="list_item py-4 px-4 my-4">
                        <p class="font-weight-bold">矢野：高</p>
                        <h3 class="item_name">大根と玉ねぎ</h3>
                        <p>コメントがあればここに入りますコメントがあればここに入りますコメントがあればここに入ります</p>
                    </div>
                    <div class="list_item py-4 px-4 my-4">
                        <p class="font-weight-bold">矢野：高</p>
                        <h3 class="item_name">大根と玉ねぎ</h3>
                        <p>コメントがあればここに入りますコメントがあればここに入りますコメントがあればここに入ります</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection