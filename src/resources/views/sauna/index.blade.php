<!-- main.blade.phpの継承 -->
@extends('layouts.sauna.main')

<!-- main.blade.php @yield('title')への値受け渡し -->
@section('title', 'サウナ一覧')

<!-- header.blade.php の読み込み -->
@include('layouts.sauna.header')

<!-- sidebar.blade.php の読み込み -->
@include('layouts.sauna.sidebar')

@section('contents')
{{-- 一般ユーザー向けサウナ一覧 --}}
<h1>おすすめサウナ一覧</h1>

<div class="sauna-list">
    @foreach($saunas as $sauna)
        <div class="sauna-item" style="border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">
            <h3>{{ $sauna->name }}</h3>
            <p>場所：{{ $sauna->address }}</p>
            {{-- ここに後で「おすすめ度（Rating）」などを表示 --}}
        </div>
    @endforeach
</div>
@endsection
