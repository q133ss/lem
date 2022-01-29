@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Список пользователей</span>
    @can('create-user')
    <span><a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить пользователя</a></sp>
    @endcan
</div>
<hr>
@if($users->count())
{{$users->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td width="100px" class="font-bold">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><span class="badge bg-info">{{$user->role->name ?? 'Не указана'}}</span></td>
                <td width="150px">
                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Редактировать"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$users->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop