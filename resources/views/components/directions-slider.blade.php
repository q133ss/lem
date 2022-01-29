<section class="sliders">
    <div class="containers">
        <div class="sliders__block">
            <div class="sliders__block-add">ООО «ЛЭМ» выполняет Направления деятельности</div>
            <div class="sliders__block-slider">
                <div class="swiper indexDescriptionSlider">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                        <div class="swiper-slide">
                            <div class="sliders__block-slider-items">
                                <a href="{{route('directions.show', [$lang, $item->id])}}"> <img src="/storage{{$item->photo}}" alt="{{$item->name}}">
                                    <div class="sliders__block-slider-items-text">
                                        <p>{!!$item->name!!}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-controls">
                    <div class="swiper-button-next">
                        <svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM57.7071 8.70711C58.0976 8.31659 58.0976 7.68342 57.7071 7.2929L51.3431 0.928937C50.9526 0.538412 50.3195 0.538412 49.9289 0.928936C49.5384 1.31946 49.5384 1.95263 49.9289 2.34315L55.5858 8L49.9289 13.6569C49.5384 14.0474 49.5384 14.6805 49.9289 15.0711C50.3195 15.4616 50.9526 15.4616 51.3431 15.0711L57.7071 8.70711ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/></svg>
                    </div>
                    <div class="swiper-button-prev">
                        <svg width="58" height="16" viewBox="0 0 58 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM57 9C57.5523 9 58 8.55229 58 8C58 7.44772 57.5523 7 57 7L57 9ZM1 9L57 9L57 7L1 7L1 9Z" fill="white"/></svg>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</section>