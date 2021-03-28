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
        // 釣果記録を受け取る
        $input = $request->all();

        // コメントが空の場合空文字を代入
        if (empty($input['image'])) {
            $input['image'] = '';
        }

        // 画像が選択されていた場合、画像データを取得する
        if (!empty($input['image'])) {
            // $upload_image = $input['image'];
            $input["file_path"] = $input['image']->store('uploads', 'public');
            $input["file_name"] = $input['image']->getClientOriginalName();
        } else {
            $input["file_path"] = "uploads/no_image_square.jpg";
            $input["file_name"] = "no_image_square.jpg";
        }


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

        $this->recodeUpdate($input);

        // // コメントが空の場合空文字を代入
        // if (empty($input['image'])) {
        //     $input['image'] = '';
        // }

        // // 画像が選択されていた場合、画像データを取得する
        // if (!empty($input['image'])) {
        //     // $upload_image = $input['image'];
        //     $input["file_path"] = $input['image']->store('uploads', 'public');
        //     $input["file_name"] = $input['image']->getClientOriginalName();
        // }

        // \DB::beginTransaction();
        // try {
        //     // 釣果情報を更新
        //     $recode = Recode::find($input['id']);
        //     $recode->fill([
        //         'user' => $input['user'],
        //         'date' => $input['date'],
        //         'place' => $input['place'],
        //         'weather' => $input['weather'],
        //         'tide' => $input['tide'],
        //         'temperature' => $input['temperature'],
        //         'fish' => $input['fish'],
        //         'length' => $input['length'],
        //         'comment' => $input['comment'],
        //         'file_name' => $input['file_name'],
        //         'file_path' => $input['file_path']
        //     ]);
        //     $recode->save();
        //     \DB::commit();
        // } catch (\Throwable $e) {
        //     \DB::rollback();
        //     logger()->error($e, ['file' => __FUNCTION__, 'line' => __LINE__]);
        //     abort(500);
        // }

        // \Session::flash('success_msg', '釣果情報を更新しました。');
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

    /**
     * DBの更新
     */
    function recodeUpdate($data)
    {
        // コメントが空の場合空文字を代入
        if (empty($data['image'])) {
            $data['image'] = '';
        }

        // 画像が選択されていた場合、画像データを取得する
        if (!empty($data['image'])) {
            // $upload_image = $data['image'];
            $data["file_path"] = $data['image']->store('uploads', 'public');
            $data["file_name"] = $data['image']->getClientOriginalName();
        }

        \DB::beginTransaction();
        try {
            // 釣果情報を更新
            $recode = Recode::find($data['id']);
            $recode->fill([
                'user' => $data['user'],
                'date' => $data['date'],
                'place' => $data['place'],
                'weather' => $data['weather'],
                'tide' => $data['tide'],
                'temperature' => $data['temperature'],
                'fish' => $data['fish'],
                'length' => $data['length'],
                'comment' => $data['comment'],
                'file_name' => $data['file_name'],
                'file_path' => $data['file_path']
            ]);
            $recode->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            logger()->error($e, ['file' => __FUNCTION__, 'line' => __LINE__]);
            abort(500);
        }

        \Session::flash('success_msg', '釣果情報を更新しました。');
    }
}