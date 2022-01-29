@extends('layouts.admin', ['right' => false])

@section('content')
<div class="row align-items-center">
    <div class="col">Список регионов</div>
    <div class="col text-end">
        <a href="{{route('admin.regions.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Добавить запись</a>
    </div>
</div>
<hr>
@if($regions->count())
<div class="table-tesponsive">
    <table class="table table-sm table-striped table-hover table-bordered">
        @foreach($regions as $region)
            <tr>
                <td>{{$region->name}}</td>
                <td width="80px">
                    <a data-toggle="tooltip" title="Редактировать" href="{{route('admin.regions.edit', $region->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <form method="post" action="{{route('admin.regions.destroy', $region->id)}}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@else
<p>Записей не найдено</p>
@endif
@stop