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

<p>{{ $currentMonth }}</p>

<table class="calendar-table" border="1">
    <thead>
        <tr>
            <th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @php $cnt = 0; @endphp

            {{-- 1日の曜日まで空のマスを作る --}}
            @for ($i = 0; $i < $firstDayOfWeek; $i++)
                <td></td>
                @php $cnt++; @endphp
            @endfor

            {{-- 1日から月末までループ --}}
            @for ($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $dateStr = $currentMonth->copy()->day($day)->format('Y-m-d');
                    $history = $histories->get($dateStr);
                @endphp

                <td class="{{ $history ? 'has-history' : '' }}" onclick="showModal('{{ $dateStr }}')">
                    <div class="day-number">{{ $day }}</div>

                    @if($history)
                        <div class="history-badge">
                            ♨️ {{ $history->sauna->name }}
                        </div>
                    @endif
                </td>

                @php $cnt++; @endphp

                {{-- 土曜日(7列目)で改行 --}}
                @if ($cnt % 7 == 0)
                    </tr><tr>
                @endif
            @endfor

            {{-- 最後の空マスを埋める --}}
            @while ($cnt % 7 != 0)
                <td></td>
                @php $cnt++; @endphp
            @endwhile
        </tr>
    </tbody>
</table>
<div id="form-display-area-overray" onclick="closeModal()"></div>
<div id="form-display-area"></div>
@endsection
