<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){

        // エロくアント
        $values = Test::all();
        $count = Test::count();
        $first = Test::findOrFail(1);//引数はid　を指定
        $whereaaa = Test::where('text','==','aaa')->get();//引数はid　を指定

        // dd($values, $count, $first, $whereaaa);

        // クエリビルダ
        DB::table('tests')->where('text','=','aaa')->select('id','text')->get();
        dd($values, $count, $first, $whereaaa);
        return view('tests.test', compact('values'));// compactで変数をview側に渡す
    }
}
