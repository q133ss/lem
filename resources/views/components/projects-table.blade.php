<section class="ind-object">
    <div class="ind-object__block">
        <div class="containers">
            <div class="ind-object__block-title">Наши объекты</div>
        </div>
        <div class="containers">
            <div class="ind-object__block-line"></div>
        </div>
        <div class="containers">
            @foreach($items->chunk(5) as $row)
            <ul class="ind-object__block-table">
                @foreach($row as $item)
                <li class="ind-object__block-table-items"> <a href="{{route('projects.show', [$lang, $item->id])}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
            @endforeach
        </div>
        <div><button class="ind-object__block-btn"><p>ЕЩЕ ОбъектЫ</p></button></div>
        <div class="ind-object__block-imgs"><a class="ind-object__block-img" href="object.html"> <img src="/assets/img/index/obj-1.png" alt="img">
        <div class="ind-object__block-img-text">КС 500 Ростовская</div></a><a class="ind-object__block-img" href="object.html"> <img src="/assets/img/index/obj-2.png" alt="img">
        <div class="ind-object__block-img-text">КС 500 Ростовская</div></a><a class="ind-object__block-img" href="object.html"> <img src="/assets/img/index/obj-3.png" alt="img">
        <div class="ind-object__block-img-text">КС 500 Ростовская</div></a></div>
    </div>
</section>