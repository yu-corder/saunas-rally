<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カテゴリ編集ページ</title>
    </head>
    <body>
        <h1>カテゴリ編集ページ</h1>
        <form action="/category/edit/{{ $category->id }}" method="post">
            @csrf
            <div>
                <label for="addname">カテゴリ名</label>
                <input type="text" name="name" id="addname" value="{{ $category->name }}">
            </div>
        </form>

        @if (isset($message))
        <p>{{ $message }}</p>
        @endif
    </body>
</html>
