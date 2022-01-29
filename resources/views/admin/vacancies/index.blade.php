@extends('layouts.admin', ['right' => false])

@section('content')
<div class="row align-items-center">
    <div class="col">Список вакансий</div>
    <div class="col text-end">
        <a href="{{route('admin.vacancies.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить запись</a>
    </div>
</div>
<hr>
@if($vacancies->count())
{{$vacancies->links()}}
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        <tr>
            <th>Название</th>
            <th width="80px">Действия</th>
        </tr>
        @foreach($vacancies as $vacancy)
            <tr>
                <td>{{$vacancy->name}}</td>
                <td>
                    <a data-toggle="tooltip" title="Редактировать" href="{{route('admin.vacancies.edit', $vacancy->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <form method="post" action="{{route('admin.vacancies.destroy', $vacancy->id)}}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{$vacancies->links()}}
@else
<p>Записей не найдено</p>
@endif
@stop