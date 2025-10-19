<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カテゴリ一覧表示ページ</title>
    </head>
    <body>
        <h1>カテゴリ一覧表示ページ</h1>

        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>カテゴリ名</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
