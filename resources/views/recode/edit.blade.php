<?php
$info = Config::get('view');
$weathers = $info['weather'];
$places = $info['place'];
$tides = $info['tide'];
$fishs = $info['fish'];
?>
@extends('layouts')
@section('title','釣果編集')
@section('content')
<div class="row">
    <div class="album py-5 bg-light">
        <h2>釣果登録フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{ $recode->id }}">
            <div class="form-group">
                <label for="user">ユーザー名：</label>
                <input type="user" name="user" value="{{ $recode->user }}">
                @if ($errors->has('user'))
                <div class="text-danger">{{ $errors->first('user') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="date">日時：</label>
                <input type="date" name="date" value="{{ $recode->date->format('Y-m-d') }}" min="2000-01-01"
                    max="2100-12-31">
                @if ($errors->has('date'))
                <div class="text-danger">{{ $errors->first('date') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="place">場所：</label>
                <select name="place">
                    @foreach ($places as $place)
                    @if ($place == $recode->place)
                    <option value="{{ $place}}" selected>{{ $place}}</option>
                    @else
                    <option value="{{ $place}}">{{ $place}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('place'))
                <div class="text-danger">{{ $errors->first('place') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="weather">天気：</label>
                <select name="weather">
                    @foreach ($weathers as $weather)
                    @if ($weather == $recode->weather )
                    <option value="{{ $weather }}" selected>{{ $weather }}</option>
                    @else
                    <option value="{{ $weather }}">{{ $weather }}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('weather'))
                <div class="text-danger">{{ $errors->first('weather') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="tide">潮：</label>
                <select name="tide">
                    @foreach ($tides as $tide)
                    @if ($tide == $recode->tide)
                    <option value="{{ $tide }}" selected>{{ $tide}}</option>
                    @else
                    <option value="{{ $tide }}">{{ $tide}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('tide'))
                <div class="text-danger">{{ $errors->first('tide') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="temperature">温度：</label>
                <input type="number" name="temperature" value="{{ $recode->temperature}}" min="-10" max="50" value="15">
                @if ($errors->has('temperature'))
                <div class="text-danger">{{ $errors->first('temperature') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="fish">魚種：</label>
                <select name="fish">
                    @foreach ($fishs as $fish)
                    @if ($fish == $recode->fish)
                    <option value="{{ $fish }}" selected>{{ $fish}}</option>
                    @else
                    <option value="{{ $fish }}">{{ $fish}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('fish'))
                <div class="text-danger">{{ $errors->first('fish') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="length">長さ：</label>
                <input id="length" name="length" type="number" value="{{ $recode->length }}">
                <span>cm</span>
                @if ($errors->has('length'))
                <div class="text-danger">{{ $errors->first('length') }}</div>
                @endif
            </div>
            <div class="comment">
                <label for="comment">コメント：</label>
                <textarea id="comment" name="comment" rows="4" class="form-control"
                    placeholder="自由にコメントを記入してください">{{ $recode->comment }}</textarea>
                @if ($errors->has('comment'))
                <div class="text-danger">{{ $errors->first('comment') }}</div>
                @endif
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">更新</button>
                <a class="btn btn-secondary" href="{{ route('recodes') }}">キャンセル</a>
                <input type="reset" class="btn btn-outline-secondary" value="リセット">
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit() {
    if (window.confirm('更新してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}
</script>
@endsection