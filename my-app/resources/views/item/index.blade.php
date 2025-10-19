<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品一覧表示ページ</title>
    </head>
    <body>
        <h1>商品一覧表示ページ</h1>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <!-- 在庫数の追加 -->
                    <th>在庫数</th>
                    <th>カテゴリ</th>
                    <!-- 入出荷枠の追加 -->
                    <th>
                        <!-- 入出荷ボタン -->
                    </th>
                    <th>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <!-- number_format()関数を利用することで下3桁ごとにカンマを付けてくれます -->
                        <td>{{ number_format($item->price) }}</td>
                        <!-- 在庫数を表示する -->
                        <td>{{ $item->stock }}</td>
                        <!-- カテゴリを表示する -->
                        <td>{{ $item->category->name }}</td>
                        <!-- 入出荷ボタンの追加 -->
                        <td>
                            <form action="{{ url('item/stock/'. $item->id) }}" method="post">
                                @csrf
                                <input
                                    type="number"
                                    name="stock[{{ $key }}]"
                                    value="{{ old("stock.$key") }}">
                                <input type="submit" name="in" value="入荷">
                                <input type="submit" name="out" value="出荷">
                            </form>
                            @error('stock.'.$key)
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <form action="{{ url('item/edit/'. $item->id) }}" method="get">
                                <input type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('item/delete/'. $item->id) }}" method="post">
                                @csrf
                                <input type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
