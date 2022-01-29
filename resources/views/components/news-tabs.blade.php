<ul class="process__block-tabs">
    <li class="process__block-tabs-items process__block-tabs-active" id="indexProcessTabs-1">
        <a href="{{route('posts.index')}}">Все публикации</a>
    </li>
    @foreach($postCategories as $key => $item)
    <li class="process__block-tabs-items" id="indexProcessTabs-{{$key}}">
        <p>{{$item->name}}</p>
    </li>
    @endforeach
</ul>
<div class="process__block-line"> </div>
@foreach($postCategories as $key => $item)
<ul class="process__block-list" id="indexProcessTabsList-{{$key}}">
    @foreach($item->frontPosts as $post)
    <a class="process__block-list-items" href="{{route('posts.show', [$lang, $post->slug])}}">
        <div class="process__block-list-items-img"> <img src="/storage/{{$post->photo}}" alt="{{$post->name}}"></div>
        <div class="process__block-list-items-text">
            <div class="process__block-list-items-text-title">{{$post->name}}</div>
            <div class="process__block-list-items-text-add">
                <h3>{{$post->created_at->format('d F Y')}}</h3>
                <p>{{$post->post_category->name}}</p>
            </div>
        </div>
    </a>
    @endforeach
</ul>
@endforeach