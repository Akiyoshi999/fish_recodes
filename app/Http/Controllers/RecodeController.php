<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recode;

class RecodeController extends Controller
{
    /**
     * 釣り記録一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        // Recodeの全データを取得する
        $recodes = Recode::all();

        // resourcesのview配下,第2引数で配列をviewに渡す
        return view('recode.recodes', ['recodes' => $recodes]);
    }
}