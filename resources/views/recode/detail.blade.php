@extends('layouts')
@section('title','釣り詳細')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <h2>釣行結果</h2>
        <dl>
            <dt>日時</dt>
            <dd>{{ $recode->date->format('Y年m月d日') }}</dd>
            <dt>場所</dt>
            <dd>{{ $recode->place }}</dd>
            <dt>天気</dt>
            <dd>{{ $recode->weather}}</dd>
            <dt>潮</dt>
            <dd>{{ $recode->tide}}</dd>
            <dt>魚種</dt>
            <dd>{{ $recode->fish}}</dd>
            <dt>長さ</dt>
            <dd>{{ $recode->length}}cm</dd>
            <dt>コメント</dt>
            <dd>{{ $recode->comment}}cm</dd>
        </dl>
    </div>
</div>
@endsection