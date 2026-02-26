<!-- main.blade.phpの継承 -->
@extends('layouts.admin.main')

<!-- main.blade.php @yield('title')への値受け渡し -->
@section('title', 'サ活履歴')

<!-- header.blade.php の読み込み -->
@include('layouts.admin.header')

<!-- sidebar.blade.php の読み込み -->
@include('layouts.admin.sidebar')

<!-- 'contents'という名称で他のBladeからの呼び出しを可能にする -->
@section('contents')
<h2>サウナ検索</h2>
<form action="{{ url('item') }}" method="get">
    <div>
        <input class="input-border" type="text" name="name" placeholder="サウナ名">
        <button class="search-btn" type="submit">検索</button>
    </div>
</form>

<h2>サ活履歴</h2>
<div>
    @include('admin.totonoi_history._calendar')
</div>
<div class="calendar-paging-group">

</div>
@endsection
