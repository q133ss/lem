@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая запись</span>
    <span>
        <a href="{{route('admin.vacancies.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
    </span>
</div>
<hr>
<form action="{{route('admin.vacancies.update', $vacancy->id)}}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    @method("PUT")
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
    <div class="form-group form-check mt-3">
        <input name="active" type="checkbox" class="form-check-input" id="active" @if($vacancy->active) checked @endif>
        <label class="form-check-label" for="active">Активна</label>
    </div>
    <div class="tab-content">
        @foreach(config('translatable.langs') as $key => $lang)
        <div class="tab-pane fade @if($key == $default) show active @endif" id="{{$key}}" role="tabpanel">
            @php
            $vacancy->setLocale($key);
            @endphp
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Заголовок: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm @error('name.$key') is-invalid @enderror" name="name[{{$key}}]" value="{{old("name.$key", $vacancy->name)}}">
                        @error("name.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Текст:</label>
                        <textarea name="detail_text[{{$key}}]" class="form-control form-control-sm editor @error('detail_text.$key') is-invalid @enderror" rows="10">{{old("detail_text.$key", $vacancy->detail_text)}}</textarea>
                        @error("detail_text.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Фото</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" name="photo">
            </div>
        </div>
        @if($vacancy->photo)
        <div class="col-md-6">
            <div class="form-group form-check">
                <input name="del_photo" type="checkbox" class="form-check-input" id="del_photo">
                <label class="form-check-label" for="del_photo">Удалить</label>
            </div>
            <img src="/storage/{{$vacancy->photo}}" alt="" class="img-fluid">
        </div>
        @endif
    </div>
    <hr>
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop