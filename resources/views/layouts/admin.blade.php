<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="/vendor/tinymce/tinymce.min.js"></script>
    <script src="/vendor/tinymce/langs/ru.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</head>
<body>
    <div class="container" id="app">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-light text-left py-1 d-flex justify-content-between align-items-center">
                <div>
                    <div class="badge badge-info text-light mr-3">{{auth()->user()->role->name}}</div>
                    {{auth()->user()->name}}
                </div>
                <div>
                    <a href="{{route('home')}}" class="text-light btn btn-sm btn-link"><i class="fa fa-home"></i></a>
                    <a href="#" class="main-sidebar-toggle d-md-none d-inline-block text-light btn btn-sm btn-link"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="row g-0 align-items-stretch">
                <div class="px-0 col-md-2 main-sidebar border-end">
                    <div class="list-group list-group-flush border-top">
                        @can('view-post')<a href="{{route('admin.categories.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.categories.*')) active @endif">Категории новостей</a>@endcan
                        @can('view-post')<a href="{{route('admin.posts.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.posts.*')) active @endif">Новости</a>@endcan
                        @can('view-direction')<a href="{{route('admin.directions.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.directions.*')) active @endif">Направления</a>@endcan
                        @can('view-project')<a href="{{route('admin.projects.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.projects.*')) active @endif">Объекты</a>@endcan
                        @can('view-reward')<a href="{{route('admin.rewards.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.rewards.*')) active @endif">Награды</a>@endcan
                        @can('view-vacancy')<a href="{{route('admin.vacancies.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.vacancies.*')) active @endif">Вакансии</a>@endcan
                        @can('view-role')<a href="{{route('admin.roles.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.roles.*')) active @endif">Роли</a>@endcan
                        @can('view-user')<a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.users.*')) active @endif">Пользователи</a>@endcan
                        @can('view-region')<a href="{{route('admin.regions.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.regions.*')) active @endif">Регионы</a>@endcan
                        @can('view-project_type')<a href="{{route('admin.project_types.index')}}" class="list-group-item list-group-item-action py-1 @if(Route::is('admin.project_types.*')) active @endif">Типы объектов</a>@endcan
                        <a href="{{route('logout')}}" class="list-group-item list-group-item-action py-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col col-md-10 p-3 main-content">
                    @if(session()->has('success'))
                        <div class="d-block mb-3 alert alert-success">{{session('success')}}</div>
                    @elseif(session()->has('danger'))
                        <div class="d-block mb-3 alert alert-danger">{{session('danger')}}</div>
                    @elseif(session()->has('warning'))
                        <div class="d-block mb-3 alert alert-warning">{{session('warning')}}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
