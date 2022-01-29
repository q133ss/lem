@extends('layouts.site')

@section('title', 'Новости')

@section('content')
    <section class="new-process">
        <div class="containers">
            <div class="new-process__block">
                <div class="new-process__block-title wow fadeInUp animated" data-wow-delay="0.8s">ПРеСС-ЦЕНТР</div>
                <ul class="new-process__block-tabs">
                    <li class="new-process__block-tabs-items new-process__block-tabs-active wow fadeInUp animated" id="newProcessTabs-1" data-wow-delay="1s">
                        <p>Все публикации</p>
                    </li>
                    @foreach($postCategory as $key => $category)
                    <li class="new-process__block-tabs-items wow fadeInUp animated" id="newProcessTabs-{{$key+2}}" data-wow-delay="1.2s">
                        <p>{{$category['name']}}</p>
                    </li>
                    @endforeach
                </ul>
                <div class="new-process__block-line wow fadeInUp animated" data-wow-delay="1s"></div>
                <ul class="new-process__block-list" id="newProcessTabsList-1">
                    @php
                        $wow_delay = 0.6;
                    @endphp
                    @foreach($postCategory as $category)
                        @foreach($category->frontPosts->slice(0,1) as $post)
                            <a class="new-process__block-list-items wow fadeInUp animated" href="{{route('posts.show', [$lang, $post->slug])}}" data-wow-delay="1s">
                                <div class="new-process__block-list-items-img">
                                    <img src="{{$post->photo}}" alt="img">
                                </div>
                                <div class="new-process__block-list-items-text">
                                    <div class="new-process__block-list-items-text-title">{{$post->name}}</div>
                                    <div class="new-process__block-list-items-text-add">
                                        <h3>{{ date('d', strtotime($post->created_at)) }} {{ $month[date('m', strtotime($post->created_at))] }} {{ date('Y', strtotime($post->created_at)) }}</h3>
                                        <p>{{$post->post_category->name}}</p>
                                    </div>
                                </div></a>
                        @endforeach
                    @endforeach
                </ul>
                @foreach($postCategory as $key => $category)
                    <ul class="new-process__block-list display-n" id="newProcessTabsList-{{$key+2}}">
                        @foreach($category->frontPosts as $post)
                            <a class="new-process__block-list-items" href="{{route('posts.show', [$lang, $post->slug])}}">
                                <div class="new-process__block-list-items-img"> <img src="{{$post->photo}}" alt="img"></div>
                                <div class="new-process__block-list-items-text">
                                    <div class="new-process__block-list-items-text-title">{{$post->name}}</div>
                                    <div class="new-process__block-list-items-text-add">
                                        <h3>{{ date('d', strtotime($post->created_at)) }} {{ $month[date('m', strtotime($post->created_at))] }} {{ date('Y', strtotime($post->created_at)) }}</h3>
                                        <p>{{$post->post_category->name}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <div class="new-process__btns wow fadeInUp animated" data-wow-delay="1s">
                <button class="new-process__btns-add">
                    <p>ЕЩЕ Новости</p>
                </button>
            </div>
        </div>
    </section>
@endsection
