@extends('main_layouts.main')

		@section('title', 'Actu-Soft | Home')
		@section('content')
			<div class="colorlib-blog">
				<div class="container">
					<div class="row">
						<div class="col-md-8 post-col">

								@forelse ($posts as $post)
								{{-- php artisan storage:link  cmd pour configurer le rep storage pour les fichiers comme rep par def--}}
									<div class="block-21 d-flex animate-box">
										<a href="{{route('post.show',$post)}}" class="blog-img" style="background-image: url({{asset('storage/'.$post->image->path.'')}})"></a>
										<div class="text">
										<h3 class="heading"><a href="{{route('post.show',$post)}}">{{$post->title}}</a></h3>
										<p class="excerpt">{{$post->excerpt}}</p>
										<div class="meta">
											<div><a href="#" class="date"><span class="icon-calendar"></span> {{$post->created_at->diffForHumans()}}</a></div>
											<div><a href="#"><span class="icon-user2"></span> {{$post->author->name}}</a></div>
											<div class="comments_count"><a href="{{route('post.show',$post)}}#$post->comments"><span class="icon-chat"></span> {{$post->comments_count}}</a></div>
										</div>
										</div>
									</div>
								@empty
									<p class="lead"> Aucun Article n'est disponible!</p>
								@endforelse


							{{-- pagination --}}
							{{ $posts->links() }}
						</div>

						<!-- SIDEBAR: start -->
						<div class="col-md-4 animate-box">
							<div class="sidebar">
								{{-- blog:dossier dans view/component, side-categories: nom du fichier --}}
								<x-blog.side-categories :categories="$categories"/>

								{{-- composant recent_post --}}
								<x-blog.side-recent-posts :recentPosts="$recent_posts"/>

								{{-- composant tags --}}
								<x-blog.side-tags :tags="$tags"/>

							</div>
						</div>
					</div>
				</div>
		</div>
	@endsection
