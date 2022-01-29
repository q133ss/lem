@extends('layouts.site')
@section('title', 'Главная')
@section('custom')
    <link rel="stylesheet" href="/vendor/jvectormap/jquery-jvectormap-2.0.5.css">
    <script>
        window.markers = {{Js::from($markers)}}
    </script>
    <script src="/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="/vendor/jvectormap/ru.js"></script>
@stop
@section('content')
    <section class="ind-header">
        <div class="ind-header__banner">
            <video poster="/assets/img/index/banner.png" autoplay muted loop src="/v3.mp4"></video>
        </div>
        <div class="containers">
            <div class="ind-header__menu wow fadeIn animated" data-wow-delay="1.4s">
                <div class="ind-header__menu-language">
                    <div class="ind-header__menu-language-ru @if($lang == 'ru') ind-header__menu-language-active @endif" id="indexHeaderLanguageRU">RU</div>
                    <div class="ind-header__menu-language-en @if($lang == 'en') ind-header__menu-language-active @endif" id="indexHeaderLanguageEN">EN</div>
                </div>
            </div>
            <div class="ind-header__info">
                <div class="ind-header__info-description">
                    <div class="ind-header__info-description-block wow fadeInLeft animated" data-wow-delay="1.4s">
                        <div class="ind-header__info-description-block-wrapper">
                            <div class="ind-header__info-description-block-title">Общество с ограниченной ответственностью «Ленэлектромонтаж»</div>
                            <button class="ind-header__info-description-block-btn"><a href="#">Компания в цифрах</a><svg width="79" height="16" viewBox="0 0 79 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M78.7071 8.70711C79.0976 8.31659 79.0976 7.68342 78.7071 7.2929L72.3431 0.928939C71.9526 0.538414 71.3195 0.538414 70.9289 0.928938C70.5384 1.31946 70.5384 1.95263 70.9289 2.34315L76.5858 8.00001L70.9289 13.6569C70.5384 14.0474 70.5384 14.6805 70.9289 15.0711C71.3195 15.4616 71.9526 15.4616 72.3431 15.0711L78.7071 8.70711ZM-8.74228e-08 9L78 9.00001L78 7.00001L8.74228e-08 7L-8.74228e-08 9Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ind-header__info-description-add wow fadeIn animated" data-wow-delay="1.6s">
                        <div class="ind-header__info-description-add-title" id="indexHeaderSliderTitle-1">Годовой оборот</div>
                        <div class="ind-header__info-description-add-title display-n" id="indexHeaderSliderTitle-2">Техническая оснащенность</div>
                        <div class="ind-header__info-description-add-title display-n" id="indexHeaderSliderTitle-3">Штат специалистов</div>
                        <div class="ind-header__info-description-add-title display-n" id="indexHeaderSliderTitle-4">Построено и реконструировано более</div>
                        <div class="ind-header__info-description-add-banner" id="indexHeaderSliderCount-1">20</div>
                        <div class="ind-header__info-description-add-banner display-n" id="indexHeaderSliderCount-2">450</div>
                        <div class="ind-header__info-description-add-banner display-n" id="indexHeaderSliderCount-3">1500</div>
                        <div class="ind-header__info-description-add-banner display-n" id="indexHeaderSliderCount-4">50</div>
                        <div class="ind-header__info-description-add-slider">
                            <div class="ind-header__info-description-add-slider-text" id="indexHeaderSliderText-1">
                                <h3>свыше млрд</h3>
                                <p>рублей</p>
                            </div>
                            <div class="ind-header__info-description-add-slider-text display-n" id="indexHeaderSliderText-2">
                                <h3>единиц спецтехники</h3>
                                <p> </p>
                            </div>
                            <div class="ind-header__info-description-add-slider-text display-n" id="indexHeaderSliderText-3">
                                <h3>высококлассных специалистов отрасли</h3>
                                <p> </p>
                            </div>
                            <div class="ind-header__info-description-add-slider-text display-n" id="indexHeaderSliderText-4">
                                <h3>Инфраструктурных проектов федерального масштаба</h3>
                                <p> </p>
                            </div>
                            <div class="ind-header__info-description-add-slider-prev"><svg width="10" height="21" viewBox="0 0 10 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.172608 10.5L9.19988 0.540707L9.19988 20.4593L0.172608 10.5Z" fill="#002C5B"/>
                                </svg>
                            </div>
                            <div class="ind-header__info-description-add-slider-next"><svg width="10" height="21" viewBox="0 0 10 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.32886 10.5L0.301583 20.4593L0.301584 0.540707L9.32886 10.5Z" fill="#002C5B"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ind-header__info-description-add-arrow"><svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0014 0L19.9909 9L0.0119295 9L10.0014 0Z" fill="#002C5B"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="ind-header__info-wrappers wow fadeInUp animated" data-wow-delay="1.7s">
                    <div class="ind-header__info-tabs" id="indexHeaderTabs">
                        <ul class="ind-header__info-tabs-list">
                            <li class="ind-header__info-tabs-items ind-header__info-tabs-items-active" id="indexHeaderTabsButton-1">
                                <div class="ind-header__info-tabs-items-icons"> <img src="/assets/img/index/icons-1.png" alt="img"></div>
                                <div class="ind-header__info-tabs-items-title">Годовой оборот</div>
                            </li>
                            <li class="ind-header__info-tabs-items" id="indexHeaderTabsButton-2">
                                <div class="ind-header__info-tabs-items-icons"> <img src="/assets/img/index/icons-2.png" alt="img"></div>
                                <div class="ind-header__info-tabs-items-title">Техническая оснащенность</div>
                            </li>
                            <li class="ind-header__info-tabs-items" id="indexHeaderTabsButton-3">
                                <div class="ind-header__info-tabs-items-icons"> <img src="/assets/img/index/icons-3.png" alt="img"></div>
                                <div class="ind-header__info-tabs-items-title">Штат специалистов</div>
                            </li>
                            <li class="ind-header__info-tabs-items" id="indexHeaderTabsButton-4">
                                <div class="ind-header__info-tabs-items-icons"> <img src="/assets/img/index/icons-4.png" alt="img"></div>
                                <div class="ind-header__info-tabs-items-title">Инфраструктурные проекты</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ind-header__info-media">
                    <div class="ind-header__info-media-wrapper">
                        <div class="ind-header__info-media-arrow">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L7.35355 0.646446L7 0.292893L6.64645 0.646446L7 1ZM13.3536 6.64645L7.35355 0.646446L6.64645 1.35355L12.6464 7.35355L13.3536 6.64645ZM6.64645 0.646446L0.646446 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646446Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="ind-header__info-media-title">ЛЭМ В ЦИФРАХ</div>
                        <div class="ind-header__info-media-arrow">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L7.35355 0.646446L7 0.292893L6.64645 0.646446L7 1ZM13.3536 6.64645L7.35355 0.646446L6.64645 1.35355L12.6464 7.35355L13.3536 6.64645ZM6.64645 0.646446L0.646446 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646446Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="ind-header__info-line wow fadeInUp animated" data-wow-delay="1.7s">
                    <div class="ind-header__info-line-wrapper">
                        <div class="ind-header__info-line-text">
                            <marquee behavior="scroll" direction="left">
                                <div class="ind-header__info-line-text-wrapper">
                                    @foreach($news_run as $run)
                                    &nbsp;&nbsp;<p> <a style="color:#ffffff" href="{{route('posts.show', [$lang,$run->slug])}}"> {{$run->name}} </p> &nbsp;&nbsp;
                                    @endforeach
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="ind-header__info-play wow fadeInUp animated" data-wow-delay="2s">
                    <div class="ind-header__info-play-icons">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 16.6428C0 7.45124 7.46204 0 16.6667 0C25.8713 0 33.3333 7.45124 33.3333 16.6428C33.3333 25.8344 25.8713 33.2856 16.6667 33.2856C7.46204 33.2856 0 25.8344 0 16.6428ZM14.0938 22.7259L22.4271 17.525C22.7315 17.3346 22.9167 17.0014 22.9167 16.6428C22.9167 16.2843 22.7315 15.9511 22.4271 15.7606L14.0938 10.5598C13.7726 10.3591 13.3677 10.3479 13.0366 10.5323C12.7055 10.7157 12.5 11.0636 12.5 11.442V21.8437C12.5 22.2221 12.7055 22.57 13.0366 22.7534C13.194 22.8407 13.368 22.8839 13.5417 22.8839C13.7334 22.8839 13.9251 22.831 14.0938 22.7259Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="ind-header__info-play-title">Воспроизвезти видео</div>
                </div>
            </div>
        </div>
    </section>
    <section class="ind-slider">
        <div class="containers">
            <div class="ind-slider__wrapper">
                <div class="ind-slider__wrapper-info wow fadeInLeft animated" data-wow-delay="0.8s">
                    <div class="ind-slider__wrapper-info-title">Более <br>10 ЛЕТ ЛИДЕРСТВА В ОТРАСЛИ</div>
                    <div class="ind-slider__wrapper-info-text">За более чем 10 лет работы в отрасли строительства инфраструктуры энергосетевого комплекса Российской Федерации, ООО «ЛЭМ» стало одним из ее лидеров. Зная сферу электроэнергетики изнутри не один десяток лет, менеджмент и персонал компании успешно выполнили множество задач высочайшего уровня сложности и ответственности.</div>
                </div>
                <div class="ind-slider__wrapper-slide wow fadeInRight animated" data-wow-delay="0.8s">
                    <div class="ind-slider__wrapper-slide-arrow opacity">
                        <div class="ind-slider__wrapper-slide-count">
                            <p>01</p><span>/04</span>
                        </div>
                        <div class="ind-slider__wrapper-slide-prev" id="SliderButtonPrev"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM57 9C57.5523 9 58 8.55229 58 8C58 7.44772 57.5523 7 57 7L57 9ZM1 9L57 9L57 7L1 7L1 9Z" fill="#003169"/>
                            </svg>
                        </div>
                        <div class="ind-slider__wrapper-slide-next" id="SliderButtonNext"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM57.7071 8.70711C58.0976 8.31659 58.0976 7.68342 57.7071 7.2929L51.3431 0.928937C50.9526 0.538412 50.3195 0.538412 49.9289 0.928936C49.5384 1.31946 49.5384 1.95263 49.9289 2.34315L55.5858 8L49.9289 13.6569C49.5384 14.0474 49.5384 14.6805 49.9289 15.0711C50.3195 15.4616 50.9526 15.4616 51.3431 15.0711L57.7071 8.70711ZM1 9L57 9L57 7L1 7L1 9Z" fill="#003169"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ind-slider__wrapper-slide-content"> <img src="/assets/img/index/slider.png" alt="img"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="ind-description">
        <div class="containers">
            <div class="ind-description__block">
                <div class="ind-description__block-logo wow fadeInLeft animated" data-wow-delay="0.8s">
                    <svg width="151" height="55" viewBox="0 0 151 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_548_100)">
                            <path d="M77.3904 24.6396H62.0549C56.3334 24.6396 54.3409 29.2644 47.1007 38.65C41.2165 46.277 36.346 52.8535 34.7695 55.0005H41.6869C43.9641 52.2131 47.8984 47.197 51.1399 42.6394C57.574 33.5929 59.3887 30.7122 62.5847 30.7122H71.2562V55.0005H77.3904V24.6401V24.6396ZM80.4575 54.9999H101.927C108.061 54.9999 111.128 51.9639 111.128 45.8918V33.7477C111.128 27.6756 108.061 24.6396 101.927 24.6396H80.4575V30.7117H101.927C103.972 30.7117 104.994 31.7233 104.994 33.7477V36.7837H92.7258V42.8558H104.994V45.8918C104.994 47.9162 103.972 48.9279 101.927 48.9279H80.4575V54.9999V54.9999ZM151.001 54.9999H144.866V35.9741L132.597 54.9999L120.329 35.9741V54.9999H114.195V24.6396H120.329L132.597 43.6654L144.866 24.6396H151.001V54.9999Z" fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M32.5562 6.78516L24.6517 7.82455L23.6016 0L32.5562 6.78516ZM32.1134 11.2135L27.0152 17.8067L26.0089 17.9387L25.228 12.1192L32.1139 11.2135H32.1134ZM21.6625 18.5103L20.6551 18.6424L13.995 13.5953L20.8816 12.6896L21.6625 18.5098V18.5103ZM19.2558 0.57158L20.3058 8.39613L12.4012 9.43552L19.2558 0.57158ZM17.9883 22.0919L18.1217 23.088L12.242 23.861L11.3271 17.0447L17.9877 22.0913L17.9883 22.0919ZM7.90458 24.4315L0 25.4708L6.85456 16.6069L7.90458 24.4315ZM18.6997 27.3904L18.8331 28.3876L13.7344 34.9802L12.8194 28.1634L18.6991 27.3904H18.6997ZM0.577427 29.7727L8.48201 28.7333L9.53203 36.5578L0.577427 29.7727ZM48.7561 19.0608L40.8516 20.1002L39.8015 12.2757L48.7561 19.0608ZM36.5136 20.6701L30.6339 21.4431L30.5005 20.4459L35.5992 13.8533L36.5141 20.6701H36.5136ZM42.479 32.2266L41.429 24.402L49.3336 23.3627L42.479 32.2266ZM38.0054 31.7888L31.3448 26.7416L31.2113 25.7455L37.0904 24.9725L38.0054 31.7888V31.7888ZM30.0772 48.2625L29.0272 40.4379L36.9318 39.3985L30.0772 48.2625ZM28.4515 36.1439L27.6705 30.3237L28.6779 30.1917L35.338 35.2388L28.4515 36.1444V36.1439ZM16.7768 42.0483L24.6814 41.009L25.7314 48.8335L16.7768 42.0483ZM17.2191 37.6205L22.3173 31.0274L23.3241 30.8953L24.1051 36.7154L17.2191 37.6211V37.6205ZM26.8504 21.5924L27.5197 26.5785L22.4821 27.2411L21.8133 22.2545L26.8504 21.5924V21.5924Z" fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_548_100">
                                <rect width="151" height="55" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="ind-description__block-title wow fadeInLeft animated" data-wow-delay="1s">ГЛАВНОЕ</div>
                <div class="ind-description__block-banner wow fadeInRight animated" data-wow-delay="1s"><img src="/assets/img/index/bannersd.png" alt="img"></div>
                <div class="ind-description__block-text">
                    <div class="ind-description__block-text-items wow fadeInLeft animated" data-wow-delay="1.2s">
                        <p>ООО «ЛЭМ» ВХОДИТ В ПЯТЕРКУ САМЫХ БЫСТРОРАСТУЩИХ КОМПАНИЙ РОССИИ!</p><span>Опыт и репутация – это знак качества. Применение современных технологий – это развитие страны и новое качество жизни!</span>
                    </div>
                </div>
                <div class="ind-description__block-photo">
                    <div class="ind-description__block-photo-items wow fadeInLeft animated" data-wow-delay="0.8s"><img src="/assets/img/index/desk-2.png" alt="img">
                        <div class="ind-description__block-photo-text">
                            <div class="ind-description__block-photo-add">БОЛЕЕ </div>
                            <div class="ind-description__block-photo-count">
                                <h3>25</h3>
                                <p> </p>
                            </div>
                            <div class="ind-description__block-photo-description">ПОСТРОЕНО ЭЛЕКТРИЧЕСКИХ ПОДСТАНЦИЙ</div>
                        </div>
                    </div>
                    <div class="ind-description__block-photo-items wow fadeInRight animated" data-wow-delay="0.8s"><img src="/assets/img/index/desk-1.png" alt="img">
                        <div class="ind-description__block-photo-text">
                            <div class="ind-description__block-photo-add">БОЛЕЕ </div>
                            <div class="ind-description__block-photo-count">
                                <h3>2000</h3>
                                <p>КМ</p>
                            </div>
                            <div class="ind-description__block-photo-description">ОБЩАЯ ПРОТЯЖЕННОСТЬ ПОСТРОЕННЫХ ЛИНИЙ ЭЛЕКТРОПЕРЕДАЧИ</div>
                        </div>
                    </div>
                </div>
                <div class="ind-description__block-description wow fadeInUp animated" data-wow-delay="0.8s">
                    <p>ООО «ЛЭМ» выполняет строительство и реконструкцию трансформаторных подстанций, распределительных устройств, кабельных сетей и воздушных линий электропередачИ классом напряжения 10-750 кВ, а также промышленно-гражданских объектов с применением собственных производственных сил.</p>
                </div>
                <div class="ind-description__block-banners wow fadeInUp animated" data-wow-delay="0.8s"><img src="/assets/img/index/desk-3.png" alt="img">
                    <div class="ind-description__block-banners-text">
                        <p>ООО «ЛЭМ» также выполняет инжиниринговую работу, осуществляя управление строительством как одиночных, так и комплексных объектов с различным инфраструктурным составом.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sliders">
        <div class="containers">
            <div class="sliders__block">
                <div class="sliders__block-add wow fadeInDown animated" data-wow-delay="0.8s">Основные направления деятельности ООО «ЛЭМ».</div>
                <div class="sliders__block-slider">
                    <div class="swiper indexDescriptionSlider">
                        <div class="swiper-wrapper">
                            @foreach($directions as $direction)
                            <div class="swiper-slide">
                                <div class="sliders__block-slider-items wow fadeInDown animated" data-wow-delay="0.8s"><a href="{{route('directions.show', [$lang, $direction])}}"> <img src="{{$direction->photo}}" alt="img">
                                        <div class="sliders__block-slider-items-text">
                                            <p>{!! $direction->name !!}</p>
                                        </div></a></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-controls">
                        <div class="swiper-button-next wow fadeInRight animated" data-wow-delay="0.8s"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM57.7071 8.70711C58.0976 8.31659 58.0976 7.68342 57.7071 7.2929L51.3431 0.928937C50.9526 0.538412 50.3195 0.538412 49.9289 0.928936C49.5384 1.31946 49.5384 1.95263 49.9289 2.34315L55.5858 8L49.9289 13.6569C49.5384 14.0474 49.5384 14.6805 49.9289 15.0711C50.3195 15.4616 50.9526 15.4616 51.3431 15.0711L57.7071 8.70711ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev wow fadeInRight animated" data-wow-delay="1s"><svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM57 9C57.5523 9 58 8.55229 58 8C58 7.44772 57.5523 7 57 7L57 9ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-scrollbar wow fadeInLeft animated" data-wow-delay="0.8s"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ind-object"> 
    <div class="ind-object__block"> 
      <div class="ind-object__block-wrapper">
        <div class="containers"> 
          <div class="ind-object__block-title wow fadeInDown animated" data-wow-delay="0.8s">Наши объекты</div>
        </div>
        <div class="containers"> 
          <div class="ind-object__block-line wow fadeInDown animated" data-wow-delay="0.8s"></div>
        </div>
        @foreach($project_types as $type)
        <div class="containers"> 
          <div class="ind-object__block-titles wow fadeInDown animated" data-wow-delay="0.8s">{{$type->name}}</div>
        </div>
        <div class="containers containers__table">
          <ul class="ind-object__block-nav wow fadeIn animated" data-wow-delay="0.8s"> 
            <li class="ind-object__block-nav-items">Название объекта </li>
            <li class="ind-object__block-nav-items">Выполненные работы </li>
            <li class="ind-object__block-nav-items">Регион расположения  </li>
          </ul>
          <ul class="ind-object__block-table wow fadeIn animated" data-wow-delay="0.8s">
            @foreach($type->projects as $project)
            <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $project])}}">{{$project->name}}</a></li>
            <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $project])}}"> {{$project->preview_text}}</a></li>
            <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $project])}}"> {{$project->region->name}}</a></li>
            @endforeach
            {{-- 
            <li class="ind-object__block-table-items"> <a href="object.html">ПС 500 кВ Енисей с заходами ВЛ 500 кВ и ВЛ 220 Кв</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> СМР, ПНР, устройство систем связи Сибирский федеральный округ</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> Сибирский федеральный округ</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html">ПС 500 кВ ЗапСиб</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> СМР, ПНР, поставка МТРиО</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> Уральский федеральный округ </a></li>
            <li class="ind-object__block-table-items"> <a href="object.html">ПС 500 кВ Тамань</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> СМР, ПНР, поставка МТРиО</a></li>
            <li class="ind-object__block-table-items"> <a href="object.html"> Южный федеральный округ</a></li> --}}
          </ul>
        </div>
        <button onclick="location.href='{{route('directions.index')}}'" class="ind-object__block-btn wow fadeInUp animated" data-wow-delay="0.8s">
          <p>ЕЩЕ ОбъектЫ</p>
        </button>
        @endforeach
      </div>
      
      <div class="ind-object__block-imgs">
        @foreach($projects->slice(0,3) as $project)
                <a class="ind-object__block-img wow fadeInLeft animated" href="{{route('projects.show', [$lang, $project])}}" data-wow-delay="0.8s">
                    <img src="{{$project->photo}}" alt="img">
                  <div class="ind-object__block-img-text">{{$project->name}}</div>
                </a>
        @endforeach
      </div>
    </div>
  </section>
    {{-- <section class="ind-object">
        <div class="ind-object__block">
            <div class="containers">
                <div class="ind-object__block-title wow fadeInDown animated" data-wow-delay="0.8s">Наши объекты</div>
            </div>
            <div class="containers">
                <div class="ind-object__block-line wow fadeInDown animated" data-wow-delay="0.8s"></div>
            </div>
            <div class="containers">
                <ul class="ind-object__block-table wow fadeIn animated" data-wow-delay="0.8s">
                    @foreach($projects->slice(0,9) as $project)
                        <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $project])}}">{{$project->name}}</a></li>
                    @endforeach
                </ul>

                <ul class="ind-object__block-table display-n" id="indexObjectAdd">
                    @foreach($projects->skip(9) as $project)
                    <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $project])}}">{{$project->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <button class="ind-object__block-btn wow fadeInUp animated" data-wow-delay="0.8s">
                <p>ЕЩЕ ОбъектЫ</p>
            </button>
            <div class="ind-object__block-imgs">
                @foreach($projects->slice(0,3) as $project)
                <a class="ind-object__block-img wow fadeInLeft animated" href="{{route('projects.show', [$lang, $project])}}" data-wow-delay="0.8s"><img src="{{$project->photo}}" alt="img">
                    <div class="ind-object__block-img-text">{{$project['name']}}</div>
                </a>
                @endforeach
            </div>
        </div>
    </section> --}}
    <section class="ind-maps">
        <div class="ind-maps__block">
            <div class="ind-maps__block-title wow fadeInDown animated" data-wow-delay="0.8s">География наших объектов</div>
            <div class="ind-maps__block-line wow fadeInDown animated" data-wow-delay="0.8s"></div>
        </div>
<div class="ind-maps__content"><div id="map" style="height: 700px;"></div></div>
    </section>
    <section class="ind-objects">
        {{-- <div class="ind-objects__slider wow fadeInDown animated" data-wow-delay="0.8s">
            <div class="swiper indexObjectsSlider">
                <div class="swiper-wrapper">
                    @foreach($projects->slice(0,5) as $project)
                        @foreach($project->photos_preview as $photo)
                            <div class="swiper-slide">
                                <div class="ind-objects__slider-items">
                                    <div class="ind-objects__slider-items-banner"> <img src="{{$photo->src}}" alt="img"></div>
                                    <div class="ind-objects__slider-items-title">Фото объектов</div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="swiper-controls">
                <div class="swiper-button-next"><svg width="166" height="24" viewBox="0 0 166 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM165.061 13.0607C165.646 12.4749 165.646 11.5251 165.061 10.9394L155.515 1.39341C154.929 0.807625 153.979 0.807625 153.393 1.39341C152.808 1.9792 152.808 2.92895 153.393 3.51473L161.879 12L153.393 20.4853C152.808 21.0711 152.808 22.0208 153.393 22.6066C153.979 23.1924 154.929 23.1924 155.515 22.6066L165.061 13.0607ZM2 13.5L164 13.5L164 10.5L2 10.5L2 13.5Z" fill="white"/>
                    </svg>
                </div>
                <div class="swiper-button-prev"><svg width="166" height="24" viewBox="0 0 166 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M164 10.5C164.828 10.5 165.5 11.1716 165.5 12C165.5 12.8284 164.828 13.5 164 13.5L164 10.5ZM0.939346 13.0607C0.353546 12.4749 0.353546 11.5251 0.939346 10.9394L10.4853 1.39341C11.0711 0.807625 12.0208 0.807625 12.6066 1.39341C13.1924 1.9792 13.1924 2.92895 12.6066 3.51473L4.12132 12L12.6066 20.4853C13.1924 21.0711 13.1924 22.0208 12.6066 22.6066C12.0208 23.1924 11.0711 23.1924 10.4853 22.6066L0.939346 13.0607ZM164 13.5L2 13.5L2 10.5L164 10.5L164 13.5Z" fill="white"/>
                    </svg>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div> --}}
    </section>
    <section class="ind-reward">
        <div class="ind-reward__block">
            <div class="ind-reward__block-banner"> <img src="/assets/img/index/trikolor.png" alt="img"></div>
            <div class="ind-reward__block-title wow fadeInDown animated" data-wow-delay="0.8s">Награды и грамоты</div>
            <div class="ind-reward__block-line"> </div>
            <div class="ind-reward__block-slider">
                <div class="swiper indexSliderReward">
                    <div class="swiper-wrapper">
                        @foreach($rewards as $reward)
                            <div class="swiper-slide">
                            <div class="ind-reward__block-slider-items wow fadeInDown animated" data-wow-delay="1s">
                                <div class="ind-reward__block-slider-items-banner"><img style="width: 80%" src="{{$reward->photo}}" alt="img"></div>
                                <div class="ind-reward__block-slider-items-text">
                                    <h3>{{$reward->name}}</h3>
                                    <p>{{$reward->description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-controls wow fadeInDown animated" data-wow-delay="1s">
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
        <section class="process">
            <div class="containers">
                <div class="process__block">
                    <div class="process__block-title wow fadeInDown animated" data-wow-delay="0.8s">ПРеСС-ЦЕНТР</div>
                    <ul class="process__block-tabs">
                        <li class="process__block-tabs-items process__block-tabs-active wow fadeInDown animated" id="indexProcessTabs-1" data-wow-delay="1s">
                            <p>Все публикации</p>
                        </li>
                        @foreach($postCategories as $key => $category)
                        <li class="process__block-tabs-items wow fadeInDown animated" id="indexProcessTabs-{{$key+2}}" data-wow-delay="1.2s">
                            <p>{{$category->name}}</p>
                        </li>
                        @endforeach
                    </ul>
                    <div class="process__block-line wow fadeInLeft animated" data-wow-delay="0.8s"></div>
                    <ul class="process__block-list" id="indexProcessTabsList-1">
                        @php
                            $wow_delay = 0.6;
                        @endphp
                        @foreach($postCategories as $category)
                            @foreach($category->frontPosts->slice(0,1) as $post)
                                <a class="process__block-list-items wow fadeInUp animated" href="{{route('posts.show', [$lang, $post->slug])}}" data-wow-delay="{{$wow_delay+=0.2}}s">
                                    <div class="process__block-list-items-img"> <img src="{{$post->photo}}" alt="img"></div>
                                    <div class="process__block-list-items-text">
                                        <div class="process__block-list-items-text-title">{{$post->name}}</div>
                                        <div class="process__block-list-items-text-add">
                                            <h3>{{ date('d', strtotime($post->created_at)) }} {{ $month[date('m', strtotime($post->created_at))] }} {{ date('Y', strtotime($post->created_at)) }}</h3>
                                            <p>{{$post->post_category->name}}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endforeach
{{--                        <a class="process__block-list-items wow fadeInUp animated" href="detail.html" data-wow-delay="1s">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-2.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">АО "СО ЕЭС" завершило испытания  для включения в работу ВЛ 500 кВ Донская</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a class="process__block-list-items wow fadeInUp animated" href="detail.html" data-wow-delay="1.2s">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-3.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Успешно и в поставленные сроки завершен комплекс работ по выполнению СМР</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
                    </ul>
                    @foreach($postCategories as $key => $category)
                        <ul class="process__block-list display-n" id="indexProcessTabsList-{{$key+2}}">
                            @foreach($category->frontPosts as $post)
                                <a class="process__block-list-items" href="{{route('posts.show', [$lang, $post->slug])}}">
                                <div class="process__block-list-items-img"> <img src="{{$post->photo}}" alt="img"></div>
                                <div class="process__block-list-items-text">
                                    <div class="process__block-list-items-text-title">{{$post->name}}</div>
                                    <div class="process__block-list-items-text-add">
                                        <h3>{{ date('d', strtotime($post->created_at)) }} {{ $month[date('m', strtotime($post->created_at))] }} {{ date('Y', strtotime($post->created_at)) }}</h3>
                                        <p>{{$post->post_category->name}}</p>
                                    </div>
                                </div></a>
                            @endforeach
                        </ul>
                    @endforeach
{{--                    <ul class="process__block-list display-n" id="indexProcessTabsList-3">--}}
{{--                        <a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-3.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Завершено выполнение комплекса работ</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-3.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">АО "СО ЕЭС" завершило испытания  для включения в работу ВЛ 500 кВ Донская</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-1.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Успешно и в поставленные сроки завершен комплекс работ по выполнению СМР</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-2.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Успешно и в поставленные сроки завершен комплекс работ по выполнению СМР</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-2.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Успешно и в поставленные сроки завершен комплекс работ по выполнению СМР</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a></ul>--}}
{{--                    <ul class="process__block-list display-n" id="indexProcessTabsList-4">--}}
{{--                        <a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-1.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Завершено выполнение комплекса работ</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-2.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">АО "СО ЕЭС" завершило испытания  для включения в работу ВЛ 500 кВ Донская</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a><a class="process__block-list-items" href="detail.html">--}}
{{--                            <div class="process__block-list-items-img"> <img src="/assets/img/index/process-3.png" alt="img"></div>--}}
{{--                            <div class="process__block-list-items-text">--}}
{{--                                <div class="process__block-list-items-text-title">Успешно и в поставленные сроки завершен комплекс работ по выполнению СМР</div>--}}
{{--                                <div class="process__block-list-items-text-add">--}}
{{--                                    <h3>11 декабря 2021</h3>--}}
{{--                                    <p>Новости</p>--}}
{{--                                </div>--}}
{{--                            </div></a></ul>--}}
                </div>
            </div>
        </section>
    </section>
    <section class="ind-career">
        <div class="ind-career__block wow fadeInDown animated" data-wow-delay="0.8s"><a href="{{route('about')}}#comp-career">
                <div class="ind-career__block-banner"><img src="/assets/img/index/add.png" alt="img"></div>
                <div class="ind-career__block-title">Карьера в ЛЭМ</div></a></div>
    </section>
@endsection
