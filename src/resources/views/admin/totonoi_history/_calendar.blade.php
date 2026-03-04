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

                <td class="{{ $history ? 'has-history' : '' }}" onclick="showModal('{{ $dateStr }}','{{ route('admin.totonoi_history.add') }}')">
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
