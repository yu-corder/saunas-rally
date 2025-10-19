<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryController extends Controller
{
    //カテゴリ一覧ページの表示
    public function index()
    {
        $categories = Category::all();

        //index.blade.phpを返却
        return view("category.index", ['categories' => $categories]);
    }

    // カテゴリ編集ページ
    public function showEdit($id)
    {

        $category = Category::find($id);

        return view('category.edit', ['category' => $category]);
    }

    // カテゴリ編集の実行
    public function edit($id, Request $request)
    {
        $category = category::find($id);

        $category->fill($request->all())->save();

        Log::info("編集が完了しました。");

        return redirect("/category");
    }

    // カテゴリ登録ページ
    public function showAdd()
    {
        return view('category.add');
    }

    // カテゴリ登録処理
    public function add(Request $request)
    {
        //フォームに入力した値の確認
        $category = new category;

        $category->fill($request->all())->save();


        Log::info("登録が完了しました。");
        return view('category.add',
        [
            'message' => '登録が完了しました。',

        ]);
    }

    //カテゴリ削除
    public function delete($id)
    {
        $category = category::find($id);

        $category->delete();

        Log::info("削除が完了しました。");


        return redirect("/category");
    }
}
