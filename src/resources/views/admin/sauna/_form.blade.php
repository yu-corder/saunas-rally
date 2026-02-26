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
<div class="form-group">
    <label for="adddescription">コメント</label>
    <textarea class="c-form__input" id="adddescription" name="description" placeholder="コメントを入力してください">
        {{ old('description', $sauna->description ?? '') }}
    </textarea>
    @error('description')
        <div>{{ $message }}</div>
    @enderror
</div>
