@props(['categories'])
<div class="side">
    <h3 class="sidebar-heading">Categories</h3>
    <div class="block-24">
        <ul>
            @foreach ($categories as $categorie )
                <li><a href="#">{{$categorie->name}} <span>{{$categorie->posts_count}}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>