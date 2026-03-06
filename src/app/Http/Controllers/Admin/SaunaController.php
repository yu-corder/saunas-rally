<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Sauna;
use App\Models\Rating;
use App\Http\Requests\Admin\SaunaRequest;
use Illuminate\Support\Facades\DB;


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

    //サウナ編集ページ
    public function showEdit($id)
    {

        $sauna = Sauna::find($id);

        return view('admin.sauna.edit', ['sauna' => $sauna]);
    }

    //サウナ編集の実行
    public function edit($id, SaunaRequest $request)
    {
        $sauna = Sauna::find($id);

        $sauna->fill($request->validated())->save();

        Log::info("編集が完了しました。");

        return redirect("/admin/sauna");
    }

    //サウナ登録ページ
    public function showAdd()
    {
        return view('admin.sauna.add');
    }

    //サウナ登録処理
    public function add(SaunaRequest $request)
    {
        //フォームに入力した値の確認
        DB::transaction(function () use ($request) {
            $sauna = new Sauna;

            $sauna->fill($request->all())->save();

            // 2. 評価データの登録
            $sauna->rating()->create([
                'cost_performance' => $request->cost_performance,
                'accessibility'    => $request->accessibility,
                'comfortability'   => $request->comfortability,
                'totonoi_score'    => $request->totonoi_score,
            ]);
        });

        Log::info("登録が完了しました。");
        return view('admin.sauna.add',
        [
            'message' => '登録が完了しました。',
        ]);
    }

    //サウナ削除
    public function delete($id)
    {
        $sauna = Sauna::find($id);

        $sauna->delete();

        Log::info("削除が完了しました。");


        return redirect("/admin/sauna");
    }

}
