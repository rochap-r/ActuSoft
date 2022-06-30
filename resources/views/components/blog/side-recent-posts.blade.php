@props(['recentPosts'])
<div class="side">
    <h3 class="sidebar-heading text-uppercase">Articles à la une</h3>
    @foreach ( $recentPosts as $recent_post )
        <div class="f-blog">
            <a href="{{route('post.show',$recent_post)}}" class="blog-img" style="background-image:url({{ $recent_post->image ? asset('storage/'.$recent_post->image->path.'') : 'https://via.placeholder.com/600x400?text=actu-soft.com'}}) ">
            </a>
            <div class="desc">
                <p class="admin"><span>{{$recent_post->created_at->diffForHumans()}}</span></p>
                <h2><a href="{{route('post.show',$recent_post)}}">{{\Str::limit($recent_post->title,20)}}</a></h2>
                <p>{{\Str::limit($recent_post->excerpt,25)}}</p>
            </div>
        </div>
    @endforeach

</div>
