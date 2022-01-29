@extends('layouts.site')

@section('title', 'Объекты')

@section('content')
    <section class="objs-header">
        <div class="objs-header__banner wow fadeInRight animated" data-wow-delay="0.8s"><img src="/assets/img/objects/banners.png" alt="img"></div>
        <div class="containers">
            <div class="objs-header__block">
                <div class="objs-header__block-title wow fadeInLeft animated" data-wow-delay="0.8s">Наши объекты</div>
                <div class="objs-header__block-text wow fadeInLeft animated" data-wow-delay="1.2s">Объекты ООО «ЛЭМ» успешно реализованные по всей территории Российской Федерации имеющие стратегическое значение для успешного развития страны: </div>
            </div>
        </div>
    </section>
    <section class="objs-map">
        <div class="objs-map__text">
            <div class="containers">
                <div class="objs-map__text-title wow fadeInUp animated" data-wow-delay="0.8s">География наших объектов</div>
                <div class="objs-map__text-line wow fadeInUp animated" data-wow-delay="1.2s"> </div>
            </div>
        </div>
        <div class="objs-map__block"> </div>
    </section>
    <section class="objs-content">
        <div class="objs-content__block">
            <div class="objs-content__block-title wow fadeInUp animated" data-wow-delay="0.8s">Электрические подстанции</div>
            <div class="objs-content__block-line wow fadeInUp animated" data-wow-delay="0.8s"> </div>
        </div>

    @foreach($projects as $project)
        <div class="objs-content__photo">
            @foreach($project->photos_preview as $photo)
            <a class="objs-content__photo-items wow fadeInUp animated" href="{{route('projects.show', [$lang , $project])}}" data-wow-delay="1.2s">
                <img src="{{$photo['src']}}" alt="img">
            </a>
            @endforeach
        </div>
        <a class="objs-content__description" href="{{route('projects.show', [$lang , $project])}}">

            <div class="objs-content__description-list">
                <div class="objs-content__description-text wow fadeInLeft animated" data-wow-delay="0.8s">
                    <h3>{{$project->name}}</h3>
                    <p>{{$project->preview_text}}</p>
                </div>
                <div class="objs-content__description-line wow fadeInUp animated" data-wow-delay="1s"></div>
                <div class="objs-content__description-customer wow fadeInRight animated" data-wow-delay="1.2s">
                    <h3>Заказчик:</h3>
                    <p>{{$project->owner}}</p>
                </div>
                <div class="objs-content__description-icons wow fadeInRight animated" data-wow-delay="0.8s">   <img src="/assets/img/objects/icons.png" alt="img"></div>
            </div>
        </a>
        @endforeach


        <div class="objs-content__btns wow fadeInUp animated" data-wow-delay="1.2s">
            <button class="objs-content__btns-items">ЕЩЕ ОбъектЫ</button>
        </div>
    </section>
@endsection
