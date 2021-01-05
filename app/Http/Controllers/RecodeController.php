<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecodeController extends Controller
{
    /**
     * 釣り記録一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        return view('recode.recodes'); // resourcesのview配下
    }
}