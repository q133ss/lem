@extends('layouts.site')

@section('title', 'Объекты')

@section('content')
  <section class="details-header"> 
    <div class="containers"> 
      <div class="details-header__block"> 
        <div class="details-header__block-way wow fadeInLeft animated" data-wow-delay="1s"> 
          <div class="details-header__block-way-prev"> <a href="#"> Направления деятельности</a></div>
          <div class="details-header__block-way-line"> /</div>
          <div class="details-header__block-way-next"> <a href="#"> {{str_replace('<br>','',$direction->name)}}</a></div>
        </div>
        <div class="details-header__block-title wow fadeInLeft animated" data-wow-delay="1.2s"> {{str_replace('<br>','',$direction->name)}}</div>
      </div>
    </div>
  </section>
  <section class="details-content"> 
    <div class="containers"> 
      <div class="details-content__block"> 
        <div class="details-content__block-text wow fadeInLeft animated" data-wow-delay="1.4s">{{$direction->preview_text}}</div>
        <div class="details-content__block-banner wow fadeInLeft animated" data-wow-delay="1.6s"> <img src="{{$direction->photo}}" alt="img"></div>
        <div class="details-content__block-description wow fadeInLeft animated" data-wow-delay="1s">
            {{$direction->detail_text}}
        </div>
        <div class="details-content__block-line wow fadeInLeft animated" data-wow-delay="1s"></div>
        <div class="details-content__block-list">
           @if(isset($direction->block->block1))
          <div class="details-content__block-list-items wow fadeInUp animated" data-wow-delay="0.8s"> <img src="/assets/img/details/icons.png" alt="img">
            <p>{{$direction->block->block1}}</p>
          </div>
          @endif
          @if(isset($direction->block->block2))
          <div class="details-content__block-list-items wow fadeInUp animated" data-wow-delay="1s"> <img src="/assets/img/details/icons.png" alt="img">
            <p>{{$direction->block->block2}}</p>
          </div>
          @endif
          @if(isset($direction->block->block3))
          <div class="details-content__block-list-items wow fadeInUp animated" data-wow-delay="1.2s"> <img src="/assets/img/details/icons.png" alt="img">
            <p>{{$direction->block->block3}}</p>
          </div>
          @endif
        </div>
        @if(isset($direction->block->block4))
        <div class="details-content__block-banners wow fadeInUp animated" data-wow-delay="1s"> <img src="{{$direction->block->block4_img}}" alt="img">
          <p>{{$direction->block->block4}}</p>
        </div>
        @endif
      </div>
    </div>
  </section>
@endsection
