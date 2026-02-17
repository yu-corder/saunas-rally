<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Sauna;


class SaunaController extends Controller
{
    //商品一覧ページの表示
    public function index()
    {
        // DBから全件取得
        $saunas = Sauna::all();
        //index.blade.phpを返却
        return view("admin.sauna.index", compact('saunas'));
    }

    // // 商品編集ページ
    // public function showEdit($id)
    // {

    //     $item = Item::find($id);

    //     return view('item.edit', ['item' => $item]);
    // }

    // // 商品編集の実行
    // public function edit($id, Request $request)
    // {
    //     $item = Item::find($id);

    //     $item->fill($request->all())->save();

    //     Log::info("編集が完了しました。");

    //     return redirect("/item");
    // }

    // // 商品登録ページ
    // public function showAdd()
    // {

    //     $categories = Category::all();

    //     return view('item.add', ['categories' => $categories]);
    // }

    // // 商品登録処理
    // public function add(CreateItemRequest $request)
    // {
    //     //フォームに入力した値の確認
    //     $item = new Item;

    //     $item->fill($request->all())->save();

    //     $categories = Category::all();


    //     Log::info("登録が完了しました。");
    //     return view('item.add',
    //     [
    //         'message' => '登録が完了しました。',
    //         'categories' => $categories,
    //     ]);
    // }

    // //商品削除
    // public function delete($id)
    // {
    //     $item = Item::find($id);

    //     $item->delete();

    //     Log::info("削除が完了しました。");


    //     return redirect("/item");
    // }

    // // 在庫の入出荷処理
    // public function editStock(EditStockRequest $request, $id)
    // {
    //     // URLのidを利用してItemモデルから1件取得
    //     $item = Item::find($id);

    //     // $requestから入力された在庫数を取得
    //     $stock = collect($request->input("stock"))->values()->first();
    //     // $requestから対象となる商品を特定するkeyを取得
    //     $key = collect($request->input("stock"))->keys()->first();

    //     // 入荷の場合
    //     if ($request->has("in")) {
    //         // 商品の在庫数に$stockを加算
    //         $item->stock += $stock;

    //         // 出荷の場合
    //     } else if ($request->has("out")) {
    //         // 在庫数が0の状態で出荷をする場合
    //         if ($item->stock == 0) {
    //             // バリデーションエラーのメッセージを投げる
    //             throw ValidationException::withMessages([
    //                 'stock.' . $key => '在庫がありません。'
    //             ]);
    //             // 出荷数が在庫数を上回っている場合
    //         } elseif ($item->stock < $stock) {
    //             // バリデーションエラーのメッセージを投げる
    //             throw ValidationException::withMessages([
    //                 'stock.' . $key => '出荷数は在庫数以下の入力をしてください。'
    //             ]);
    //         } else {
    //             // 商品の在庫数から$stockを減算
    //             $item->stock -= $stock;
    //         }
    //     }

    //     // 在庫数の変動を保存
    //     $item->save();

    //     // 一覧ページへのリダイレクト
    //     return redirect("/item");
    // }
}
