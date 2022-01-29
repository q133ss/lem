<section class="ind-objects">
    <div class="ind-objects__slider">
        <div class="swiper indexObjectsSlider">
            <div class="swiper-wrapper">
                @foreach($items as $item)
                <div class="swiper-slide">
                    <div class="ind-objects__slider-items">
                        <div class="ind-objects__slider-items-banner"> <img src="/storage/{{$item->photo}}" alt="{{$item->name}}"></div>
                        <div class="ind-objects__slider-items-title">Фото объектов</div>
                    </div>
                </div>
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
    </div>
</section>