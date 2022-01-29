@extends('layouts.admin', ['right' => false])

@section('content')
<div class="row align-items-center">
    <div class="col">Список новостей</div>
    <div class="col-4">
        <form action="" class="input-group">
            <select name="category" class="form-control form-control-sm">
                <option value="" selected>Все категории</option>
                @foreach($categories as $item)
                    <option value="{{$item->id}}" @if(isset($category) && $category == $item->id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn-sm btn-primary"><span class="fa fa-filter"></span></button>
            </div>
        </form>
    </div>
    <div class="col text-end">
        @can('view-post')<a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить новость</a>@endcan
    </div>
</div>
<hr>
@if($posts->count())
{{$posts->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th width="100px">Добавлено</th>
            <th width="80px">Действия</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td class="font-bold">{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->category->name ?? '-'}}</td>
                <td>{{$post->created_at->format('d.m.Y H:i')}}</td>
                <td>
                    <a data-toggle="tooltip" title="Редактировать" href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <form method="post" action="{{route('admin.posts.destroy', $post->id)}}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$posts->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop