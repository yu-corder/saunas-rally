<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品登録ページ</title>
    </head>
    <body>
        <h1>商品登録ページ</h1>
        <form action="{{ url('item/add') }}" method="post">
            @csrf
            <div>
                <label for="addname">商品名</label>
                <input
                    type="text"
                    name="name"
                    id="addname"
                    value="{{ old('name') }}"
                    placeholder="商品名を入力してください">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input
                    type="number"
                    name="price"
                    value="{{ old('price') }}"
                    placeholder="価格を入力してください">
                @error('price')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <select name="category_id" id="category">
                    <option value="">--1 つ選択してください--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (int)old('category_id')===$category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="submit" name="send" value="登録">
            </div>
        </form>

        @if (isset($message))
        <p>{{ $message }}</p>
        @endif
    </body>
</html>
