@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая рубрика</span>
    <span><a href="{{route('admin.categories.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a></span>
</div>
<hr>
<form action="{{route('admin.categories.store')}}" method="POST">
    @csrf
    @php
    $default = config('translatable.fallback_locale');
    @endphp
    <nav>
        <div class="nav nav-tabs" role="tablist">
            @foreach(config('translatable.langs') as $key => $lang)
            <a href="#" class="nav-item nav-link @if($key == $default) active @endif" data-bs-toggle="tab" data-bs-target="#{{$key}}">{{$lang}}</a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content">
        @foreach(config('translatable.langs') as $key => $lang)
            <div class="tab-pane fade @if($key == $default) show active @endif" id="{{$key}}" role="tabpanel">
                <div class="form-group">
                    <label>Название:</label>
                    <input type="text" class="form-control form-control-sm @error("name.$key.") is-invalid @enderror" name="name[{{$key}}]" value="{{old("name.$key")}}">
                    @error("name.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop