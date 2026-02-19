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

        // 1. その月のカレンダーに必要な履歴データを取得
        $histories = TotonoiHistory::with('sauna') // Sauna名も一緒に取得
            ->whereYear('visit_date', $currentMonth->year)
            ->whereMonth('visit_date', $currentMonth->month)
            ->get()
            ->keyBy('visit_date'); // 日付をキーにしてViewで使いやすくする

        // 2. Viewへ渡す
        return view('admin.totonoi_history.index', compact('currentMonth', 'histories'));
    }
}
