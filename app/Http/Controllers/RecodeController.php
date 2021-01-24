<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recode;
use App\Http\Requests\RecodeRequest;

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
            logger()->error("id=$id nod found", ['file' => __FUNCTION__, 'line' => __LINE__]);
            return redirect(route('recodes'));
        }

        // resourcesのview配下,第2引数で配列をviewに渡す
        return view('recode.detail', ['recode' => $recode]);
    }


    /**
     * 釣果記録登録画面を表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('recode.form');
    }



    /**
     * 釣果を登録する
     * 
     * @return view
     */
    public function exeStore(RecodeRequest $request)
    {
        // dd($request);
        // 釣果記録を受け取る
        $input = $request->all();

        \DB::beginTransaction();
        try {
            // 釣果を登録
            Recode::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            logger()->error($e, ['file' => __FUNCTION__, 'line' => __LINE__]);
            abort(500);
        }

        \Session::flash('success_msg', '釣果を登録しました。');
        return redirect(route('recodes'));
    }


    /**
     * 釣果記録の編集画面を表示する
     * @param int $id 
     * @return view
     */
    public function showEdit($id)
    {
        $recode = Recode::find($id);

        // データチェック
        if (is_null($recode)) {
            \Session::flash('err_msg', 'データがありません');
            logger()->error("id=$id nod found", ['file' => __FUNCTION__, 'line' => __LINE__]);
            return redirect(route('recodes'));
        }

        // resourcesのview配下,第2引数で配列をviewに渡す
        return view('recode.edit', ['recode' => $recode]);
    }


    /**
     * 釣果情報を更新する
     * 
     * @return view
     */
    public function exeUpdate(RecodeRequest $request)
    {
        // 釣果情報を受け取る
        $input = $request->all();

        // dd($input);
        \DB::beginTransaction();
        try {
            // 釣果情報を更新
            $recode = Recode::find($input['id']);
            $recode->fill([
                'user' => $input['user'],
                'date' => $input['date'],
                'place' => $input['place'],
                'weather' => $input['weather'],
                'tide' => $input['tide'],
                'temperature' => $input['temperature'],
                'fish' => $input['fish'],
                'length' => $input['length'],
                'comment' => $input['comment'],
            ]);
            $recode->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            logger()->error($e, ['file' => __FUNCTION__, 'line' => __LINE__]);
            abort(500);
        }

        \Session::flash('success_msg', '釣果情報を更新しました。');
        return redirect(route('recodes'));
    }


    /**
     * 釣果記録を削除する
     * @param int $id 
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません');
            logger()->error("id=$id nod found", ['file' => __FUNCTION__, 'line' => __LINE__]);
            return redirect(route('recodes'));
        }

        try {
            // 釣果を削除
            $recode = Recode::destroy($id);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            logger()->error($e, ['file' => __FUNCTION__, 'line' => __LINE__]);
            abort(500);
        }

        \Session::flash('success_msg', '釣果情報を削除しました。');
        return redirect(route('recodes'));
    }
}