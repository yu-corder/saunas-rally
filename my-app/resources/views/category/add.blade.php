<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カテゴリ登録ページ</title>
    </head>
    <body>
        <h1>カテゴリ登録ページ</h1>
        <form action="{{ url('category/add') }}" method="post">
            @csrf
            <div>
                <label for="addname">カテゴリ名</label>
                <input type="text" name="name" id="addname">
            </div>
        </form>

        @if (isset($message))
        <p>{{ $message }}</p>
        @endif
    </body>
</html>
