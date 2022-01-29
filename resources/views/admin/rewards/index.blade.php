@extends('layouts.admin', ['right' => false])

@section('content')
<div class="row align-items-center">
    <div class="col">Список наград</div>
    <div class="col text-end">
        <a href="{{route('admin.rewards.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить запись</a>
    </div>
</div>
<hr>
@if($rewards->count())
{{$rewards->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th width="80px">Действия</th>
        </tr>
        @foreach($rewards as $reward)
            <tr>
                <td>{{$reward->name}}</td>
                <td>
                    <a data-toggle="tooltip" title="Редактировать" href="{{route('admin.rewards.edit', $reward->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <form method="post" action="{{route('admin.rewards.destroy', $reward->id)}}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$rewards->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop