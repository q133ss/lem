@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая запись</span>
    <span>
        <a href="{{route('admin.projects.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
    </span>
</div>
<hr>
<form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data" id="form">
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
        <input name="active" type="checkbox" class="form-check-input" id="active" @if($project->active) checked @endif>
        <label class="form-check-label" for="active">Активна</label>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Регион</label>
                <select name="region_id" class="form-control form-control-sm">
                    @foreach($regions as $item)
                        <option value="{{$item->id}}" @if($project->region_id == $item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Тип</label>
                <select name="project_type_id" class="form-control form-control-sm">
                    @foreach($types as $item)
                        <option value="{{$item->id}}" @if($project->project_type_id == $item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Широта:</label>
                <input type="text" class="form-control form-control-sm @error('lat') is-invalid @enderror" name="lat" value="{{old("lat", $project->lat)}}">
                @error("lat") <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Долгота:</label>
                <input type="text" class="form-control form-control-sm @error('lon') is-invalid @enderror" name="lon" value="{{old("lon", $project->lon)}}">
                @error("lon") <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
        </div>
    </div>
    <div class="tab-content">
        @foreach(config('translatable.langs') as $key => $lang)
        <div class="tab-pane fade @if($key == $default) show active @endif" id="{{$key}}" role="tabpanel">
            @php
            $project->setLocale($key);
            @endphp
            <div class="form-group">
                <label>Заказчик:</label>
                <input type="text" class="form-control form-control-sm @error('owner.$key') is-invalid @enderror" name="owner[{{$key}}]" value="{{old("owner.$key", $project->owner)}}">
                @error("owner.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Заголовок:</label>
                        <input type="text" class="form-control form-control-sm @error('name.$key') is-invalid @enderror" name="name[{{$key}}]" value="{{old("name.$key", $project->name)}}">
                        @error("name.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Короткий текст:</label>
                        <textarea name="preview_text[{{$key}}]" class="form-control form-control-sm @error('preview_text.$key') is-invalid @enderror" rows="5">{{old("preview_text.$key", $project->preview_text)}}</textarea>
                        @error("preview_text.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Текст:</label>
                        <textarea name="detail_text[{{$key}}]" class="form-control form-control-sm editor @error('detail_text.$key') is-invalid @enderror" rows="10">{{old("detail_text.$key", $project->detail_text)}}</textarea>
                        @error("detail_text.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Фото</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" name="photo">
            </div>

            <div class="form-group">
                <label class="d-block">Галерея</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" multiple name="gallery[]">
            </div>
            <div class="form-group">
                <label class="d-block">Видео</label>
                <input type="file" accept=".mp4, .mov" multiple name="video[]">
            </div>

        </div>
        @if($project->photo)
        <div class="col-md-6">
            <div class="form-group form-check">
                <input name="del_photo" type="checkbox" class="form-check-input" id="del_photo">
                <label class="form-check-label" for="del_photo">Удалить</label>
            </div>
            <img src="/storage/{{$project->photo}}" alt="" class="img-fluid">
        </div>
        @endif
    </div>
    <hr>
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop
