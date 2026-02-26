<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Sauna;
use App\Models\TotonoiHistory;
use Carbon\Carbon;



class TotonoiHistoryController extends Controller
{
    //t_totonoi_historiesテーブルから取得
    public function index(Request $request)
    {
        // 今月がいつかを取得
        $monthParam = $request->query('month', now()->format('Y-m'));
        $currentMonth = \Carbon\Carbon::parse($monthParam)->startOfMonth();

        $daysInMonth = $currentMonth->daysInMonth; // その月が何日まであるか
        $firstDayOfWeek = $currentMonth->dayOfWeek; // 1日の曜日 (0:日, 1:月... 6:土)

        $histories = TotonoiHistory::with('sauna') // Sauna名も一緒に取得
            ->whereYear('visit_date', $currentMonth->year)
            ->whereMonth('visit_date', $currentMonth->month)
            ->get()
            ->keyBy('visit_date'); // 日付をキーにしてViewで使いやすくする

        return view('admin.totonoi_history.index', compact('currentMonth', 'daysInMonth', 'firstDayOfWeek', 'histories'));
    }

    //さ活登録ページ
    public function showAdd(Request $request)
    {
        if ($request->ajax()) {

            $saunas = Sauna::all();
            $html = view('admin.totonoi_history._form', compact('saunas'))->render();

            return response()->json([
                'status' => 'success',
                'html' => $html,
            ]);
        }
    }

    //さ活登録処理
    public function add(Request $request)
    {
        //フォームに入力した値の確認
        $totonoiHistory = new TotonoiHistory;
        $totonoiHistory->fill($request->all())->save();

        Log::info("登録が完了しました。");
        return redirect("/admin/totonoi-history");
    }
}
