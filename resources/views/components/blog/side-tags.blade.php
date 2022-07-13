@props(['tags'])
<div class="side">
    <h3 class="sidbar-heading text-uppercase">Tags</h3>
    <div class="block-26">
        <ul>
            @foreach ( $tags as $tag )
                <li><a href="{{ route('tag.show',$tag) }}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
