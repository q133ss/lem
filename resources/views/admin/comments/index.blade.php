@extends('layouts.admin', ['right' => false])

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <span>Список комментариев</span>
    <span>
        <button class="btn btn-sm btn-danger" onclick="$('#delmany').submit()"><i class="fa fa-trash"></i> Удалить выбранное</button>
    </span>
</div>
<hr>
@if($comments->count())
{{$comments->links()}}
<form action="{{route('admin.comments.delmany')}}" method="post" class="confirmed" id="delmany">
@csrf
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th width="50px"></th>
            <th width="90px">IP</th>
            <th width="90px">Добавлен</th>
            <th>Текст</th>
            <th width="150px">Действия</th>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{$comment->id}}"></td>
                <td class="font-bold">{{$comment->ip}}</td>
                <td>{{$comment->created_at->format('d.m.Y')}}</td>
                <td>{{$comment->text}}</td>
                <td>
                    <a data-toggle="tooltip" title="Редактировать" href="{{route('admin.comments.edit', $comment->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</form>
{{$comments->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop