@extends('layouts')
@section('title','釣り記録')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">

            @foreach($recodes as $recode)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top"
                        data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                        alt="Card image cap">
                    <div class="card-body">
                        <div class="simple-contents">
                            <p>日時：{{ $recode->date }}</p>
                            <p>場所：{{ $recode->place}}</p>
                            <p>長さ：{{ $recode->length }}cm</p>
                        </div>
                        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                                <button type="button" class="btn btn-sm btn-outline-secondary">詳細</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">削除</button>
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
</div>
</div>
@endsection