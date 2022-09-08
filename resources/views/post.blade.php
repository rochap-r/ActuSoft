@extends('main_layouts.main')

		@section('title', 'actu-soft.com | '.$post->title)
        @section('custom_css')
            <style>
                .class-single .desc img{
                    width:100%;
                }
                .classes .classes-img {
                    height: 400px;
					border-radius: 10px;
                }
            </style>
        @endsection
		@section('content')
		<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row row-pb-lg">
							<div class="col-md-12 animate-box">
								<div class="classes class-single">
									<div class="classes-img" style="background-image: url({{ $post->image ? asset('storage/'.$post->image->path.''): 'https://via.placeholder.com/600x400?text=actu-soft.com'}})">
									</div>
									<div class="desc desc2 ">
										<h3 class="text-justify"><a href="#">{{$post->title}}</a></h3>
										<p class="text-justify">
                                             <small><span class="icon-user2"></span>  <span class="text-primary">{{$post->author->name }}</span></small>&nbsp;&nbsp;&nbsp;&nbsp;
                                             <small ><span class="icon-calendar"></span> {{$post->created_at->diffForHumans()}}</small>
										</p>
										{!! $post->body !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row row-pb-lg animate-box">
							<div class="col-md-12">
								<h2 class="colorlib-heading-2"> {{$post->comments->count()}} Comments</h2>
								@foreach ($post->comments as $comment)
								{{-- id="comment_{{$comment->id}}"		cfr postController show commentaire --}}
									<div id="comment_{{$comment->id}}" class="review">
										<div class="user-img" style="background-image:url({{ $comment->user->image ? asset('storage/'.$comment->user->image->path.'') : 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-%ED%94%84%EB%A1%9C%ED%95%84-%EC%9D%B5%EB%AA%85%EC%9D%98-%EC%96%BC%EA%B5%B4-%EC%95%84%EC%9D%B4%EC%BD%98-%ED%9A%8C%EC%83%89-%EC%8B%A4%EB%A3%A8%EC%97%A3-%EC%82%AC%EB%9E%8C%EC%9E%85%EB%8B%88%EB%8B%A4-%EB%82%A8%EC%84%B1-%EA%B8%B0%EB%B3%B8-%EC%95%84%EB%B0%94%ED%83%80-%EC%82%AC%EC%A7%84-%EC%9E%90%EB%A6%AC-%ED%91%9C%EC%8B%9C-%EC%9E%90-%ED%9D%B0%EC%83%89-%EB%B0%B0%EA%B2%BD%EC%97%90-%EA%B3%A0%EB%A6%BD-%EB%B2%A1%ED%84%B0-%EC%9D%BC%EB%9F%AC%EC%8A%A4%ED%8A%B8-%EB%A0%88%EC%9D%B4-%EC%85%98.jpg' }})"></div>
										<div class="desc">
											<h4>
												<span class="text-left">{{$comment->user->name}}</span>
												<span class="text-right">{{$comment->created_at->diffForHumans()}}</span>
											</h4>
											<p>{{$comment->body}}</p>
											<p class="star">
												<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
											</p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
                        {{-- affichage du composant msg flash  --}}
                        <x-blog.message :status=" 'success' "/>

						<div class="row animate-box">



							<div class="col-md-12">



								<h2 class="colorlib-heading-2">Dîtes quelque chose</h2>
								{{-- decommenter pour obliger d'etre connecté avant de commenter --}}
								@auth
									<form method="POST" action="{{route('post.add_comment',$post)}}">
										@csrf

										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="body">body</label> -->
												<textarea name="body" id="body" cols="20" rows="10" class="form-control" placeholder="Dis quelque chose à ce sujet"></textarea>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" value="Post Comment" class="btn btn-primary">
										</div>
									</form>
								@endauth
								@guest
									<p class="lead">
										<a href="{{route('login')}}">Se Connecter</a>
										Ou <a href="{{route('register')}}">S'inscrire</a>
										pour Commenter
									</p>
								@endguest
							</div>
						</div>
					</div>

					<!-- SIDEBAR: start -->
					<div class="col-md-4 animate-box">
						<div class="sidebar">
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

        @section('custom_js')
            <script>
                setTimeout(()=>{
                    $('.global-message').fadeOut()
                },5000)
            </script>
        @endsection
