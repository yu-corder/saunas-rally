<!-- 'sidebar'という名称で他のBladeからの呼び出しを可能にする -->
@section('sidebar')
<div class="sidebar">
    <h2>メニュー</h2>
    <ul class="menu-list">
        <li><a href="{{ url('admin/sauna') }}">総合ランキング</a></li>
        <li><a href="{{ url('admin/sauna/add') }}">都道府県別ランキング</a></li>
    </ul>
</div>
@endsection
