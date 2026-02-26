<div class="registration-form">
    <h3>サ活登録</h3>
    <form id="sa-katsu-form">
        {{-- 日付などはJSからセットできるようにしておくと便利 --}}
        <input type="hidden" name="visit_date" id="form-visit-date">

        <label>サウナ名</label>
        <select name="sauna_id">
            @foreach($saunas as $sauna)
                <option value="{{ $sauna->id }}">{{ $sauna->name }}</option>
            @endforeach
        </select>

        <label>セット数</label>
        <input type="number" name="sets" value="3">

        <button type="button" onclick="submitForm()">保存</button>
    </form>
</div>
