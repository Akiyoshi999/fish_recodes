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
    /**
     * 釣り記録詳細を表示する
     * @param int $id 
     * @return view
     */
    public function showDetail($id)
    {
        // Recodeの全データを取得する
        $recode = Recode::find($id);

        // データチェック
        if (is_null($recode)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('recodes'));
        }

        // resourcesのview配下,第2引数で配列をviewに渡す
        return view('recode.detail', ['recode' => $recode]);
    }
}