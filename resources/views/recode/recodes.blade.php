@extends('layouts')
@section('title','釣り記録')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach($recodes as $recode)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ Storage::url($recode->file_path) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="simple-contents">
                            <p>日時：{{ $recode->date->format('Y年m月d日') }}</p>
                            <p>場所：{{ $recode->place}}</p>
                            <p>魚種：{{ $recode->fish}}</p>
                            <p>長さ：{{ $recode->length }}cm</p>
                        </div>
                        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                                <a class="btn btn-sm btn-outline-secondary" href="recode/{{ $recode->id }}">詳細</a>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                <a class="btn btn-sm btn-outline-secondary" href="recode/edit/{{ $recode->id }}">編集</a>
                                <form method="POST" action="{{ Route('delete', $recode->id) }}"
                                    onsubmit="return checkDelete()">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">削除</button>
                            </div>
                            <!-- <small class="text-muted">9 mins</small> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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