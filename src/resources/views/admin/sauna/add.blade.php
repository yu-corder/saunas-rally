<!-- main.blade.phpの継承 -->
@extends('layouts.admin.main')

<!-- main.blade.php @yield('title')への値受け渡し -->
@section('title', 'サウナ一覧')

<!-- header.blade.php の読み込み -->
@include('layouts.admin.header')

<!-- sidebar.blade.php の読み込み -->
@include('layouts.admin.sidebar')

<!-- 'contents'という名称で他のBladeからの呼び出しを可能にする -->
@section('contents')
<h1>サウナ登録ページ</h1>
<form action="{{ url('admin/sauna/add') }}" method="post">
    @csrf
    <div>
        <label for="addname">サウナ名</label>
        <input
            type="text"
            name="name"
            id="addname"
            value="{{ old('name') }}"
            placeholder="サウナ名を入力してください">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="addpostcode">郵便番号</label>
        <input
            id="addpostcode"
            type="number"
            name="postcode"
            value="{{ old('postcode') }}"
            placeholder="郵便番号を入力してください">
        @error('postcode')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="addprefecture">都道府県</label>
        <input
            id="addprefecture"
            type="text"
            name="prefecture"
            value="{{ old('prefecture') }}"
            placeholder="都道府県を入力してください">
        @error('prefecture')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="addcity">市区町村</label>
        <input
            id="addcity"
            type="text"
            name="city"
            value="{{ old('city') }}"
            placeholder="市区町村を入力してください">
        @error('city')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="addaddress">それ以降の住所</label>
        <input
            id="addaddress"
            type="text"
            name="address"
            value="{{ old('address') }}"
            placeholder="市区町村以降を入力してください">
        @error('address')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="addsauna_temp">サウナ温度</label>
        <input
            id="addsauna_temp"
            type="number"
            name="sauna_temp"
            value="{{ old('sauna_temp') }}"
            placeholder="サウナ温度">
    </div>
    <div>
        <label for="addwater_temp">水風呂温度</label>
        <input
            id="addwater_temp"
            type="number"
            name="water_temp"
            value="{{ old('water_temp') }}"
            placeholder="水風呂温度">
    </div>
    <div>
        <label for="addhas_loyly">ロウリュウ有無</label>
        <select name="has_loyly" id="addhas_loyly">
            <option value="">--1 つ選択してください--</option>
            <option value="0">無し</option>
            <option value="1">有り</option>
        </select>
    </div>
    <div>
        <label for="adddescription">コメント</label>
        <textarea id="adddescription" name="description" placeholder="コメントを入力してください"></textarea>
        @error('description')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="submit" name="send" value="登録">
    </div>
</form>
@if (isset($message))
<p>{{ $message }}</p>
@endif
@endsection
