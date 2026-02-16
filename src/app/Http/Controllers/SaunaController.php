<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


class SaunaController extends Controller
{
    //商品一覧ページの表示
    public function index()
    {
        $items = Item::all();

        //index.blade.phpを返却
        return view("sauna.index");
    }

}
