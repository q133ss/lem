@extends('layouts.site')

@section('title', 'Объекты')

@section('content')
    <section class="obj-content" id="objectsBlock-1">
        <div class="obj-content__wrapper">
            <div class="obj-content__banner"><img src="/assets/img/object/banner-1.1.png" alt="img"></div>
            <div class="containers">
                <div class="obj-content__block">
                    <div class="obj-content__block-name wow fadeInLeft animated" data-wow-delay="0.8s">
                        <div class="obj-content__block-name-prev"> <a href="{{route('projects.index')}}">наши объекты </a></div>
                        <div class="obj-content__block-name-line"> /</div>
                        <div class="obj-content__block-name-next"> <a href="#">объект </a></div>
                    </div>
                    <div class="obj-content__block-title wow fadeInLeft animated" data-wow-delay="0.8s">{{$project->name}}</div>
                    <div class="obj-content__block-description wow fadeInLeft animated" data-wow-delay="0.8s">
                        <div class="obj-content__block-description-customer">Заказчик:</div>
                        <div class="obj-content__block-description-text">{{$project['owner']}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="obj-contents">
            <div class="obj-contents__blocks">
                <div class="obj-contents__blocks-description">
                    <div class="obj-contents__blocks-description-text">
                        <div class="obj-contents__blocks-description-items wow fadeInLeft animated" data-wow-delay="0.8s"> {{$project->preview_text}} </div>
                        <div class="obj-contents__blocks-description-icons wow fadeInRight animated" data-wow-delay="0.8s">   <img src="/assets/img/object/home.png" alt="img"></div>
                    </div>
                </div>
                <div class="obj-contents__blocks-photo"> <img class="wow fadeInUp animated" src="{{$project->photo}}" alt="img" data-wow-delay="0.8s"></div>
                <div class="obj-contents__blocks-descriptions">
                    <div class="obj-contents__blocks-descriptions-wrapper wow fadeInUp animated" data-wow-delay="0.8s">
                        <p>{{$project->detail_text}}</p>
                    </div>
                </div>
                <div class="obj-contents__blocks-photos">
                    @foreach($project->photos as $photo)
                    <div class="obj-contents__blocks-photos-items wow fadeInUp animated" data-wow-delay="0.8s"> <img src="{{$photo->src}}" alt="img"></div>
                    @endforeach

                        @foreach($project->video as $video)
                            <div class="obj-contents__blocks-photos-items wow fadeInUp animated" data-wow-delay="0.8s">
                                <video controls="controls" style="height: 100%; width: 100%;">
                                    <source src="{{$video->src}}">
                                </video>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="obj-contenta">
            <div class="obj-contenta__arrow">
                <div class="obj-contenta__arrow-prev wow fadeInLeft animated" data-wow-delay="0.8s" id="objectButtonPrev-1"><img src="{{$objects[$objects->count()-1]->photo}}" alt="img">
                    <div class="obj-contenta__arrow-prev-text">
                        <svg width="45" height="24" viewBox="0 0 45 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.939339 13.0607C0.353554 12.4749 0.353554 11.5251 0.939339 10.9393L10.4853 1.3934C11.0711 0.807614 12.0208 0.807614 12.6066 1.3934C13.1924 1.97919 13.1924 2.92893 12.6066 3.51472L4.12132 12L12.6066 20.4853C13.1924 21.0711 13.1924 22.0208 12.6066 22.6066C12.0208 23.1924 11.0711 23.1924 10.4853 22.6066L0.939339 13.0607ZM45 13.5L2 13.5L2 10.5L45 10.5L45 13.5Z" fill="white"/>
                        </svg>
                        <p> <span>{{$objects[$objects->count()-1]->name}}</span></p>
                    </div>
                </div>
                <div class="obj-contenta__arrow-next wow fadeInRight animated" data-wow-delay="0.8s" id="objectButtonNext-1"><img src="{{$objects[0]->photo}}" alt="img">
                    <div class="obj-contenta__arrow-next-text">
                        <p> <span>{{$objects[0]->name}}</span></p><svg width="45" height="24" viewBox="0 0 45 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M44.0607 13.0607C44.6464 12.4749 44.6464 11.5251 44.0607 10.9393L34.5147 1.3934C33.9289 0.807614 32.9792 0.807614 32.3934 1.3934C31.8076 1.97919 31.8076 2.92893 32.3934 3.51472L40.8787 12L32.3934 20.4853C31.8076 21.0711 31.8076 22.0208 32.3934 22.6066C32.9792 23.1924 33.9289 23.1924 34.5147 22.6066L44.0607 13.0607ZM-1.31134e-07 13.5L43 13.5L43 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="white"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($objects as $key => $project)
        <section class="obj-content display-n" id="objectsBlock-{{$key+2}}">
            <div class="obj-content__wrapper">
                <div class="obj-content__banner"><img src="/assets/img/object/banner-1.1.png" alt="img"></div>
                <div class="containers">
                    <div class="obj-content__block">
                        <div class="obj-content__block-name wow fadeInLeft animated" data-wow-delay="0.8s">
                            <div class="obj-content__block-name-prev"> <a href="{{route('projects.index')}}">наши объекты </a></div>
                            <div class="obj-content__block-name-line"> /</div>
                            <div class="obj-content__block-name-next"> <a href="#">объект </a></div>
                        </div>
                        <div class="obj-content__block-title wow fadeInLeft animated" data-wow-delay="0.8s">{{$project->name}}</div>
                        <div class="obj-content__block-description wow fadeInLeft animated" data-wow-delay="0.8s">
                            <div class="obj-content__block-description-customer">Заказчик:</div>
                            <div class="obj-content__block-description-text">{{$project['owner']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="obj-contents">
                <div class="obj-contents__blocks">
                    <div class="obj-contents__blocks-description">
                        <div class="obj-contents__blocks-description-text">
                            <div class="obj-contents__blocks-description-items wow fadeInLeft animated" data-wow-delay="0.8s"> {{$project->preview_text}} </div>
                            <div class="obj-contents__blocks-description-icons wow fadeInRight animated" data-wow-delay="0.8s">   <img src="/assets/img/object/home.png" alt="img"></div>
                        </div>
                    </div>
                    <div class="obj-contents__blocks-photo"> <img class="wow fadeInUp animated" src="{{$project->photo}}" alt="img" data-wow-delay="0.8s"></div>
                    <div class="obj-contents__blocks-descriptions">
                        <div class="obj-contents__blocks-descriptions-wrapper wow fadeInUp animated" data-wow-delay="0.8s">
                            <p>{{$project->detail_text}}</p>
                        </div>
                    </div>
                    <div class="obj-contents__blocks-photos">
                        @foreach($project->photos as $photo)
                            <div class="obj-contents__blocks-photos-items wow fadeInUp animated" data-wow-delay="0.8s"> <img src="{{$photo->src}}" alt="img"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="obj-contenta">
                <div class="obj-contenta__arrow">
                    @if(isset($objects[$key-1]))
                    <div class="obj-contenta__arrow-prev wow fadeInLeft animated" data-wow-delay="0.8s" id="objectButtonPrev-{{$key+2}}"><img src="{{$objects[$key-1]->photo}}" alt="img">
                        <div class="obj-contenta__arrow-prev-text">
                            <svg width="45" height="24" viewBox="0 0 45 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939339 13.0607C0.353554 12.4749 0.353554 11.5251 0.939339 10.9393L10.4853 1.3934C11.0711 0.807614 12.0208 0.807614 12.6066 1.3934C13.1924 1.97919 13.1924 2.92893 12.6066 3.51472L4.12132 12L12.6066 20.4853C13.1924 21.0711 13.1924 22.0208 12.6066 22.6066C12.0208 23.1924 11.0711 23.1924 10.4853 22.6066L0.939339 13.0607ZM45 13.5L2 13.5L2 10.5L45 10.5L45 13.5Z" fill="white"/>
                            </svg>
                            <p> <span>{{$objects[$key-1]->name}}</span></p>
                        </div>
                    </div>
                    @else
                        <div class="obj-contenta__arrow-prev wow fadeInLeft animated" data-wow-delay="0.8s" id="objectButtonPrev-{{$key+2}}"><img src="{{$project->photo}}" alt="img">
                            <div class="obj-contenta__arrow-prev-text">
                                <svg width="45" height="24" viewBox="0 0 45 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.939339 13.0607C0.353554 12.4749 0.353554 11.5251 0.939339 10.9393L10.4853 1.3934C11.0711 0.807614 12.0208 0.807614 12.6066 1.3934C13.1924 1.97919 13.1924 2.92893 12.6066 3.51472L4.12132 12L12.6066 20.4853C13.1924 21.0711 13.1924 22.0208 12.6066 22.6066C12.0208 23.1924 11.0711 23.1924 10.4853 22.6066L0.939339 13.0607ZM45 13.5L2 13.5L2 10.5L45 10.5L45 13.5Z" fill="white"/>
                                </svg>
                                <p> <span>{{$project->name}}</span></p>
                            </div>
                        </div>
                    @endif

                    @if(isset($objects[$key+1]))
                    <div class="obj-contenta__arrow-next wow fadeInRight animated" data-wow-delay="0.8s" id="objectButtonNext-{{$key+2}}"><img src="{{$objects[$key+1]->photo}}" alt="img">
                        <div class="obj-contenta__arrow-next-text">
                            <p> <span>{{$objects[$key+1]->name}}</span></p><svg width="45" height="24" viewBox="0 0 45 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44.0607 13.0607C44.6464 12.4749 44.6464 11.5251 44.0607 10.9393L34.5147 1.3934C33.9289 0.807614 32.9792 0.807614 32.3934 1.3934C31.8076 1.97919 31.8076 2.92893 32.3934 3.51472L40.8787 12L32.3934 20.4853C31.8076 21.0711 31.8076 22.0208 32.3934 22.6066C32.9792 23.1924 33.9289 23.1924 34.5147 22.6066L44.0607 13.0607ZM-1.31134e-07 13.5L43 13.5L43 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach
@endsection
