@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Редактирование записи</span>
    <span>
        <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Сохранить" onclick="$('#form').submit()"><i class="fa fa-save"></i></button>
        <a href="{{route('admin.comments.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
        @can('delete-comment')
        <form action="{{route('admin.comments.destroy', $comment->id)}}" class="d-inline confirmed" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button href="{{route('admin.comments.index')}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></button>
        </form>
        @endcan
    </span>
</div>
<hr>
<form action="{{route('admin.ips.store')}}" method="POST" class="input-group input-group-sm">
    @csrf
    <input type="hidden" name="ip" value="{{$comment->ip}}">
    <label class="input-group-append">
        <label class="input-group-text">
            <input name="status" value="warning" type="radio" checked> Предупредить
        </label>
        <label class="input-group-text">
            <input name="status" value="banned" type="radio"> Забанить
        </label>
        <button class="btn btn-sm btn-primary"><span class="fa fa-check"></span></button>
    </label>
</form>
<form action="{{route('admin.comments.update', $comment->id)}}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Имя:</label>
        <input type="text" class="form-control form-control-sm" name="name" value="{{old('name') ? old('name') : $comment->name}}">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" class="form-control form-control-sm" name="email" value="{{old('email') ? old('email') : $comment->email}}">
    </div>
    <div class="form-group">
        <label>Текст:</label>
        <textarea name="text" class="form-control form-control-sm" rols="3">{{$comment->text}}</textarea>
    </div>
    @can('update-comment')
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
    @endcan
</form>
@stop