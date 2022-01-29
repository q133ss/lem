@extends('layouts.admin', ['right' => false])
@section('scripts')
<script type="text/javascript" src="/editor/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
@endsection
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая запись</span>
    <span>
        <a href="{{route('admin.posts.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
    </span>
</div>
<hr>
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data" id="form">
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
    <div class="row align-items-center">
        
        <div class="col-md-6">
            <div class="form-group form-check">
                <input name="active" type="checkbox" class="form-check-input" id="active" checked>
                <label class="form-check-label" for="active">Активна</label>
            </div>

            <div class="form-group form-check">
                <input name="run_str" type="checkbox" class="form-check-input" id="run_str">
                <label class="form-check-label" for="run_str">Добавить в бегущую строку?</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Рубрика</label>
                <select name="post_category_id" class="form-control form-control-sm">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="tab-content">
        @foreach(config('translatable.langs') as $key => $lang)
        <div class="tab-pane fade @if($key == $default) show active @endif" id="{{$key}}" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Заголовок: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm @error('name.$key') is-invalid @enderror" name="name[{{$key}}]" value="{{old("name.$key")}}">
                        @error("name.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Короткий текст:</label>
                        <textarea name="preview_text[{{$key}}]" class="form-control form-control-sm @error('preview_text.$key') is-invalid @enderror" rows="5">{{old("preview_text.$key")}}</textarea>
                        @error("preview_text.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Текст:</label>
                        <textarea name="detail_text[{{$key}}]" class="form-control form-control-sm editor @error('detail_text.$key') is-invalid @enderror" rows="10">{{old("detail_text.$key")}}</textarea>
                        @error("detail_text.$key") <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="form-group">
        <label class="d-block">Фото</label>
        <input type="file" accept=".jpg,.jpeg,.png,.gif" name="photo">
    </div>
    <hr>
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop