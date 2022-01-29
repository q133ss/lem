@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Список категорий</span>
    <span><a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить категорию</a></span>
</div>
<hr>
@if($categories->count())
{{$categories->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td width="100px" class="font-bold">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td width="150px"><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Редактировать"><i class="fa fa-edit"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
{{$categories->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop