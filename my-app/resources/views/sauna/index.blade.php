<!-- main.blade.phpの継承 -->
@extends('layouts.main')

<!-- main.blade.php @yield('title')への値受け渡し -->
@section('title', '商品一覧')

<!-- header.blade.php の読み込み -->
@include('layouts.header')

<!-- sidebar.blade.php の読み込み -->
@include('layouts.sidebar')

<!-- 'contents'という名称で他のBladeからの呼び出しを可能にする -->
@section('contents')
<h1>サウナ</h1>
<h2>サウナ一覧</h2>
<form action="{{ url('item') }}" method="get">
    <div>
        <input class="input-border" type="text" name="name" placeholder="商品名">
        <input class="input-border" type="text" name="price" placeholder="値段">
        <button class="search-btn" type="submit">検索</button>
    </div>
</form>

<h2>商品一覧</h2>
    <table class="tbl">
        <thead>
            <tr>
                <th>id</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>カテゴリ</th>
                <th class="tbl-stock">入出荷</th>
                <th><!-- 編集ボタン --></th>
                <th><!-- 削除ボタン --></th>
            </tr>
        </thead>
    </table>
@endsection
