<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.min.css">
    <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/assets/css/style.min.css">
    @yield('custom')
</head>
<body>

<header class="header">
    <div class="header__nav wow fadeIn animated" data-wow-delay="0.8s">
        <div class="header__nav-wrapper">
            <div class="header__nav-logo wow fadeInDown animated" data-wow-delay="1.0s"><a href="/"><img src="/assets/svg/index/lg.svg" alt="logo"></a></div>
            <ul class="header__nav-list wow fadeInDown animated" data-wow-delay="1.4s">
                <li class="header__nav-list-items"> <a href="{{route('about')}}">О компании</a></li>
                <li class="header__nav-list-items"> <a href="{{route('directions.index')}}">Направления  деятельности</a></li>
                <li class="header__nav-list-items"> <a href="{{route('projects.index')}}">Наши объекты</a></li>
                <li class="header__nav-list-items"> <a href="{{route('contacts')}}">КОНТАКТЫ</a></li>
                <li class="header__nav-list-items"> <a href="{{route('posts.index')}}">ПРЕСС-ЦЕНТР</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="header__nav-burger wow fadeInDown animated" id="menu-open" data-wow-delay="1.8s"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line y1="17" x2="15" y2="17" stroke="#002C5B" stroke-width="2"/>
        <line y1="9" x2="15" y2="9" stroke="#002C5B" stroke-width="2"/>
        <line x1="7" y1="1" x2="15" y2="1" stroke="#002C5B" stroke-width="2"/>
    </svg>
</div>
@yield('content')
<footer class="footer">
    <div class="containers">
        <div class="footer__block">
            <div class="footer__block-title wow fadeInDown animated" data-wow-delay="0.8s">ООО «ЛЭМ» - Энергия будущего в настоящем!</div>
            <div class="footer__block-btns">
                <button class="footer__block-btn wow fadeInDown animated" data-wow-delay="1s"> <a href="{{route('about')}}">О компании</a></button>
                <button class="footer__block-button wow fadeInDown animated" data-wow-delay="1s"><a href="mailto:info@lem-ltd.ru">Написать нам</a></button>
            </div>
        </div>
        <div class="footer__wrapper">
            <div class="footer__wrapper-lists">
                <ul class="footer__wrapper-list wow fadeInUp animated" data-wow-delay="0.8s">
                    <div class="footer__wrapper-list-title">Навигация</div>
                    <li class="footer__wrapper-list-items"> <a href="/">Главная</a></li>
                    <li class="footer__wrapper-list-items"><a href="{{route('about')}}">О компании </a></li>
                    <li class="footer__wrapper-list-items"> <a href="{{route('directions.index')}}">Направления деятельности</a></li>
                    <li class="footer__wrapper-list-items"> <a href="{{route('projects.index')}}">Наши объекты</a></li>
                    <li class="footer__wrapper-list-items"> <a href="{{route('posts.index')}}">Пресс-центр</a></li>
                    <li class="footer__wrapper-list-items"> <a href="{{route('contacts')}}">Контакты</a></li>
                </ul>
{{--                <ul class="footer__wrapper-list wow fadeInUp animated" data-wow-delay="1.1s">--}}
{{--                    <div class="footer__wrapper-list-title">Навигация</div>--}}
{{--                    <li class="footer__wrapper-list-items"> <a href="index.html">Главная</a></li>--}}
{{--                    <li class="footer__wrapper-list-items"><a href="{{route('about')}}">О компании </a></li>--}}
{{--                    <li class="footer__wrapper-list-items"> <a href="deflation.html">Направления деятельности</a></li>--}}
{{--                    <li class="footer__wrapper-list-items"> <a href="object.html">Наши объекты</a></li>--}}
{{--                    <li class="footer__wrapper-list-items"> <a href="new.html">Пресс-центр</a></li>--}}
{{--                    <li class="footer__wrapper-list-items"> <a href="contact.html">Контакты</a></li>--}}
{{--                </ul>--}}
                <ul class="footer__wrapper-list wow fadeInUp animated" data-wow-delay="1.4s">
                    <div class="footer__wrapper-list-title">Контакты</div>
                    <li class="footer__wrapper-list-item"> <a href="mailto:info@lem-ltd.ru"> info@lem-ltd.ru </a><br><a href="tel:+74996840016"> +7 (499) 684-00-16</a></li>
                    <li class="footer__wrapper-list-itemr">г. Москва, поселение Московский Киевское шоссе, 22-й км., домовладение 4, строение 1, блок А, офисный подъезд 9, этаж 9 (Бизнес парк Румянцево).</li>
                </ul>
                <ul class="footer__wrapper-list wow fadeInUp animated" data-wow-delay="1.7s">
                    <div class="footer__wrapper-list-title">Документы</div>
                    <li class="footer__wrapper-list-items"> <a href="#">Реквизиты </a></li>
                    <li class="footer__wrapper-list-items"> <a href="#">Документация</a></li>
                    <li class="footer__wrapper-list-items"> <a href="#">Вакансии</a></li>
                </ul>
            </div>
            <div class="footer__wrapper-line wow fadeInLeft animated" data-wow-delay="0.8s"></div>
            <div class="footer__wrapper-add">
                <div class="footer__wrapper-add-logo wow fadeInUp animated" data-wow-delay="0.8s"><svg width="121" height="46" viewBox="0 0 121 46" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <mask id="mask0_95_1846" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="121" height="46">
                            <rect width="121" height="45.925" fill="url(#pattern0)"/>
                        </mask>
                        <g mask="url(#mask0_95_1846)">
                            <rect x="-17.8752" y="-20.3501" width="169.95" height="89.925" fill="#003169"/>
                        </g>
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_95_1846" transform="scale(0.00227273 0.00598802)"/>
                            </pattern>
                            <image id="image0_95_1846" width="440" height="167" xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>
                </div>
                <div class="footer__wrapper-add-rights wow fadeInUp animated" data-wow-delay="1.2s">© 2021 ООО «ЛЭМ». Все права защищены. </div>
                <div class="footer__wrapper-add-create wow fadeInUp animated" data-wow-delay="1.4s"><a href="https://bpump.ru/">Сайт разработан компанией <span>Bussines Pump </span></a></div>
            </div>
        </div>
    </div>
</footer>
<div class="menu">
    <div class="menu__close" id="menu-close"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.5 6.5L6.5 19.5" stroke="#003169" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
            <path d="M6.5 6.5L19.5 19.5" stroke="#003169" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="menu__logo"> <a href="/"><img src="/assets/svg/index/gl.svg" alt="logo"></a></div>
    <div class="menu__block">
        <ul class="menu__block-list">
            <li class="menu__block-list-items"> <a href="{{route('about')}}">О компании</a></li>
            <li class="menu__block-list-items"> <a class="menu__block-list-items-text" href="{{route('directions.index')}}">
                    <p>Направления деятельности</p></a>
                <ul class="menu__block-list-items-content">
                   @foreach($menu_directions as $direction)
                        <li class="menu__block-list-items-content-element"> <a href="{{route('directions.show', [$lang, $direction])}}">{{str_replace('<br>','',$direction->name)}}</a></li>
                   @endforeach
                </ul>
            </li>
            <li class="menu__block-list-items"><a class="menu__block-list-items-text" href="{{route('projects.index')}}">
                    <p>Наши Объекты</p></a>
                <ul class="menu__block-list-items-sliders">
                    <div class="swiper menuSliders">
                        <div class="swiper-wrapper">
                            @foreach($menu_projects as $project)
                                <div class="swiper-slide">
                                    <a class="menu__block-list-items-sliders-element" href="{{route('projects.show', [$lang,$project])}}">
                                        <div class="menu__block-list-items-sliders-photo">
                                            <img src="{{$project->photo}}" alt="img">
                                        </div>
                                        <div class="menu__block-list-items-sliders-text">{{$project->name}}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-controls">
                        <div class="swiper-button-next"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM57.7071 8.70711C58.0976 8.31659 58.0976 7.68342 57.7071 7.2929L51.3431 0.928937C50.9526 0.538412 50.3195 0.538412 49.9289 0.928936C49.5384 1.31946 49.5384 1.95263 49.9289 2.34315L55.5858 8L49.9289 13.6569C49.5384 14.0474 49.5384 14.6805 49.9289 15.0711C50.3195 15.4616 50.9526 15.4616 51.3431 15.0711L57.7071 8.70711ZM1 9L57 9L57 7L1 7L1 9Z" fill="#003169"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM57 9C57.5523 9 58 8.55229 58 8C58 7.44772 57.5523 7 57 7L57 9ZM1 9L57 9L57 7L1 7L1 9Z" fill="#003169"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </ul>
            </li>
            <li class="menu__block-list-items"> <a href="{{route('posts.index')}}">ПРЕСС-ЦЕНТР</a></li>
            <li class="menu__block-list-items"> <a href="{{route('contacts')}}">КОНТАКТЫ</a></li>
        </ul>
    </div>
    <div class="menu__contact">
        <div class="menu__contact-title">Телефон:</div>
        <div class="menu__contact-items"> <a href="tel:+74996840016"> +7 (499) 684-00-16 (справочный)</a></div>
        <div class="menu__contact-items"> <a href="tel:+74952405885">+7 (495) 240-58-85 (факс)</a></div>
    </div>
</div>
<div class="modelVideo display-n">
    <div class="modelVideo__close">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.5 6.5L6.5 19.5" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
            <path d="M6.5 6.5L19.5 19.5" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="modelVideo__block">
        <video id="modelVideo" poster="/assets/img/index/banner.png" controls src="/v3.mp4"></video>
    </div>
</div>

<div class="modelReward display-n">
    <div class="modelReward__close">
       <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.5 6.5L6.5 19.5" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
<path d="M6.5 6.5L19.5 19.5" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
</svg>
    </div>
    <div class="modelReward__wrapper"> 
      <div class="swiper indexModalReward">
        <div class="swiper-wrapper" id="indexModalReward"></div>
      </div>
      <div class="swiper-controls">
        <div class="swiper-button-next"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM57.7071 8.70711C58.0976 8.31659 58.0976 7.68342 57.7071 7.2929L51.3431 0.928937C50.9526 0.538412 50.3195 0.538412 49.9289 0.928936C49.5384 1.31946 49.5384 1.95263 49.9289 2.34315L55.5858 8L49.9289 13.6569C49.5384 14.0474 49.5384 14.6805 49.9289 15.0711C50.3195 15.4616 50.9526 15.4616 51.3431 15.0711L57.7071 8.70711ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/>
</svg>
        </div>
        <div class="swiper-button-prev"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM57 9C57.5523 9 58 8.55229 58 8C58 7.44772 57.5523 7 57 7L57 9ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/>
</svg>
        </div>
      </div>
    </div>
  </div>

<script src="/assets/js/script.min.js"></script>
</html>
