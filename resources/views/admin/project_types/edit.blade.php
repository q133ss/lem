@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая запись</span>
    <span>
        <a href="{{route('admin.project_types.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
    </span>
</div>
<hr>
<form action="{{route('admin.project_types.update', $project_type->id)}}" method="POST" enctype="multipart/form-data" id="form">
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
    <div class="tab-content">
        @foreach(config('translatable.langs') as $key => $lang)
        <div class="tab-pane fade @if($key == $default) show active @endif" id="{{$key}}" role="tabpanel">
            @php
            $project_type->setLocale($key);
            @endphp
            <div class="form-group">
                <label>Название: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('name.$key') is-invalid @enderror" name="name[{{$key}}]" value="{{old("name.$key", $project_type->name)}}">
                @error("name.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Иконка</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" name="icon">
            </div>
        </div>
        @if($project_type->icon)
        <div class="col-md-6">
            <div class="form-group form-check">
                <input name="del_icon" type="checkbox" class="form-check-input" id="del_icon">
                <label class="form-check-label" for="del_icon">Удалить</label>
            </div>
            <img src="/storage/{{$project_type->icon}}" alt="" class="img-fluid">
        </div>
        @endif
    </div>
    <hr>
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop