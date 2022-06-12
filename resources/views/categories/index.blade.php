@extends('main_layouts.main')

@section('title', 'Actu-Soft | Categories')
@section('content')
    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 categories-col">
                    <div class="row">
                        @forelse ($categories as $categorie)
                            {{-- php artisan storage:link  cmd pour configurer le rep storage pour les fichiers comme rep par def--}}
                            <div class="col-md-3">
                                <div class="block-21 d-flex animate-box">
                                    <div class="text">
                                        <h3 class="heading"><a href="{{route('category.show',$categorie)}}">{{  $categorie->name }}</a></h3>
                                        <div class="meta">
                                            <div><a href="#" class="date"><span class="icon-calendar"></span> {{$categorie->created_at->diffForHumans()}}</a></div>
                                            <div><a href="#"><span class="icon-user2"></span> {{$categorie->user->name}}</a></div>
                                            <div class="comments_count">
                                                <a href="{{route('category.show',$categorie)}}"><span class="icon-book"></span> {{ $categorie->posts_count }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                            <p class="lead"> Aucune Caterogie n'est disponible!</p>
                        @endforelse
                    </div>
                    {{-- pagination --}}
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
