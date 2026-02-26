<div class="registration-form">
    <h2 class="">サ活登録</h3>
    <form id="sa-katsu-form">
        <div>
            <label for="form-visit-date">サ活日</label>
            <input type="text" type="date" name="visit_date" id="form-visit-date" disabled>
        </div>
        <div>
            <label for="addname">サウナ名</label>
            <select id="addname" name="sauna_id">
                @foreach($saunas as $sauna)
                    <option value="{{ $sauna->id }}">{{ $sauna->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="sa-katsu-button-group">
            <button class="tbl-btn c-btn--delete sa-katsu-button" type="button" onclick="closeModal()">閉じる</button>
            <button class="tbl-btn c-btn--primary sa-katsu-button" type="button" onclick="submitForm()">保存</button>
        </div>
    </form>
</div>
