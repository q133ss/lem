@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Новая роль</span>
    <span><a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a></sp>
</div>
<hr>
<form action="{{route('admin.roles.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Название:</label>
        <input type="text" class="form-control form-control-sm" name="name">
    </div>
    <div class="row">
        @foreach($permissions as $permission)
            <div class="col-md-3">
                <div class="form-group form-check">
                    <input name="permissions[{{$permission->id}}]" type="checkbox" class="form-check-input" id="p{{$permission->id}}">
                    <label class="form-check-label" for="p{{$permission->id}}">{{$permission->label}}</label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
</form>
@stop