<div class="form-group">
    <label for="addname">サウナ名<span class="c-badge--required">必須</span></label>
    <input
        class="c-form__input"
        type="text"
        name="name"
        id="addname"
        value="{{ old('name', $sauna->name ?? '') }}"
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
            value="{{ old('postcode', $sauna->postcode ?? '') }}"
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
            value="{{ old('prefecture', $sauna->prefecture ?? '') }}"
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
            value="{{ old('city', $sauna->city ?? '') }}"
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
            value="{{ old('address', $sauna->address ?? '') }}"
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
            value="{{ old('sauna_temp', $sauna->sauna_temp ?? '') }}"
            placeholder="サウナ温度">
    </div>
    <div class="form-group">
        <label for="addwater_temp">水風呂温度</label>
        <input
            class="c-form__input"
            id="addwater_temp"
            type="number"
            name="water_temp"
            value="{{ old('water_temp', $sauna->water_temp ?? '') }}"
            placeholder="水風呂温度">
    </div>
</div>
<div class="form-group">
    <label for="addhas_loyly">ロウリュウ有無<span class="c-badge--required">必須</span></label>
    <select name="has_loyly" id="addhas_loyly" class="c-form__input">
        <option value="">--1 つ選択してください--</option>
        <option value="0" {{ old('has_loyly', $sauna->has_loyly ?? '') == '0' ? 'selected' : '' }}>無し</option>
        <option value="1" {{ old('has_loyly', $sauna->has_loyly ?? '') == '1' ? 'selected' : '' }}>有り</option>
    </select>
    @error('has_loyly')
        <div class="error-message">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="adddescription">コメント</label>
    <textarea class="c-form__input" id="adddescription" name="description" placeholder="コメントを入力してください">
        {{ old('description', $sauna->description ?? '') }}
    </textarea>
    @error('description')
        <div>{{ $message }}</div>
    @enderror
</div>
