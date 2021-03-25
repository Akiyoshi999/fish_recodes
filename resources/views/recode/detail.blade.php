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
    <div>
        <img src="{{ Storage::url($recode->file_path) }}" height="300" width="400">
    </div>
</div>
<div class="mt-5">
    <table>

        <tr>
            <td>
                <form method="GET" action="{{ Route('edit', $recode->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">編集</button>
                </form>
            </td>
            <td>
                <form method="POST" action="{{ Route('delete', $recode->id) }}" onsubmit="return checkDelete()">
                    @csrf
                    <button type="submit" class="btn btn-secondary">削除</button>
                </form>
            </td>
            <td> <a class="btn btn-outline-secondary" href="{{ route('recodes') }}">戻る</a></td>
        </tr>
    </table>
</div>
<script>
function checkDelete() {
    if (window.confirm('削除してもよろしいですか')) {
        return true;
    } else {
        return false;
    }
}
</script>
@endsection