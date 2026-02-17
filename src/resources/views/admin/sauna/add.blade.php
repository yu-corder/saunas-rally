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
<h2>サウナ登録</h2>
<form action="{{ url('admin/sauna/add') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="addname">サウナ名<span class="c-badge--required">必須</span></label>
        <input
            class="c-form__input"
            type="text"
            name="name"
            id="addname"
            value="{{ old('name') }}"
            placeholder="サウナ名を入力してください">
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="addpostcode">郵便番号<span class="c-badge--required">必須</span></label>
            <input
                class="c-form__input--short"
                id="addpostcode"
                type="number"
                name="postcode"
                value="{{ old('postcode') }}"
                placeholder="郵便番号を入力してください">
            @error('postcode')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="addprefecture">都道府県<span class="c-badge--required">必須</span></label>
            <input
                class="c-form__input--short"
                id="addprefecture"
                type="text"
                name="prefecture"
                value="{{ old('prefecture') }}"
                placeholder="都道府県を入力してください">
            @error('prefecture')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="addcity">市区町村<span class="c-badge--required">必須</span></label>
            <input
                class="c-form__input--short"
                id="addcity"
                type="text"
                name="city"
                value="{{ old('city') }}"
                placeholder="市区町村を入力してください">
            @error('city')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="addaddress">それ以降の住所<span class="c-badge--required">必須</span></label>
            <input
                class="c-form__input--short"
                id="addaddress"
                type="text"
                name="address"
                value="{{ old('address') }}"
                placeholder="市区町村以降を入力してください">
            @error('address')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="addsauna_temp">サウナ温度</label>
            <input
                class="c-form__input"
                id="addsauna_temp"
                type="number"
                name="sauna_temp"
                value="{{ old('sauna_temp') }}"
                placeholder="サウナ温度">
        </div>
        <div class="form-group">
            <label for="addwater_temp">水風呂温度</label>
            <input
                class="c-form__input"
                id="addwater_temp"
                type="number"
                name="water_temp"
                value="{{ old('water_temp') }}"
                placeholder="水風呂温度">
        </div>
    </div>
    <div class="form-group">
        <label for="addhas_loyly">ロウリュウ有無</label>
        <select name="has_loyly" id="addhas_loyly" class="c-form__input">
            <option value="">--1 つ選択してください--</option>
            <option value="0">無し</option>
            <option value="1">有り</option>
        </select>
    </div>
    <div class="form-group">
        <label for="adddescription">コメント</label>
        <textarea class="c-form__input" id="adddescription" name="description" placeholder="コメントを入力してください"></textarea>
        @error('description')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input class="tbl-btn edit c-btn--primary" type="submit" name="send" value="登録">
    </div>
</form>
@if (isset($message))
<p>{{ $message }}</p>
@endif
@endsection
