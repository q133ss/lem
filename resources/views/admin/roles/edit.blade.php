@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Редактирование роли</span>
    <span>
        <a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="К списку"><i class="fa fa-arrow-left"></i></a>
        @can('delete-role')
        <form action="{{route('admin.roles.destroy', $role->id)}}" class="d-inline confirmed" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button href="{{route('admin.roles.index')}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></button>
        </form>
        @endcan
    </span>
</div>
<hr>
<form action="{{route('admin.roles.update', $role->id)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Название:</label>
        <input type="text" class="form-control form-control-sm" name="name" value="{{old('name') ? old('name') : $role->name}}">
    </div>
    <div class="row">
        @foreach($permissions as $permission)
            <div class="col-md-3">
                <div class="form-group form-check">
                    <input name="permissions[{{$permission->id}}]" type="checkbox" class="form-check-input" id="p{{$permission->id}}" @if($role->permissions->contains('id', $permission->id)) checked @endif>
                    <label class="form-check-label" for="p{{$permission->id}}">{{$permission->label}}</label>
                </div>
            </div>
        @endforeach
    </div>
    @can('update-role')
    <div class="form-group">
        <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Сохранить</button>
    </div>
    @endcan
</form>
@stop