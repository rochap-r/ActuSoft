@extends('main_layouts.main')
@section('title','actu-soft.com | Apropos ')
@section('content')


		<div id="colorlib-counter" class="colorlib-counters" style="margin-left:15px !important;">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="about-desc">
							<div class="about-img-1 animate-box" style="background-image: url({{ asset('storage/'.$setting->about_first_image) }});"></div>
							<div class="about-img-2 animate-box" style="background-image: url({{ asset('storage/'.$setting->about_second_image) }});"></div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-12 colorlib-heading animate-box">
								<h1 class="heading-big">Qui suis-je?</h1>
								<h2>Qui suis-je?</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 animate-box">
								<p>{{ $setting->about_first_text }}</p>
							</div>
							<div class="col-md-6 col-xs-6 animate-box">
								<div class="counter-entry">
									<div class="desc">
										<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $total_posts }}" data-speed="5000" data-refresh-interval="50"></span>
										<span class="colorlib-counter-label">Articles</span>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-6 animate-box">
								<div class="counter-entry">
									<div class="desc">
										<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $total_categories }}" data-speed="5000" data-refresh-interval="50"></span>
										<span class="colorlib-counter-label">Categories</span>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-6 animate-box">
								<div class="counter-entry">
									<div class="desc">
										<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $total_users }}" data-speed="5000" data-refresh-interval="50"></span>
										<span class="colorlib-counter-label">Abonnés</span>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-6 animate-box">
								<div class="counter-entry">
									<div class="desc">
										<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $total_comments }}" data-speed="5000" data-refresh-interval="50"></span>
										<span class="colorlib-counter-label">Commentaires</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3>Centre d'apprentissage en ligne des connaissances</h3>
						<p>{{ $setting->about_second_text }}</p>
					</div>
					<div class="col-md-6">
						<div class="fancy-collapse-panel">
                    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	                     <div class="panel panel-default">
	                         <div class="panel-heading" role="tab" id="headingOne">
	                             <h4 class="panel-title">
	                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Notre Mission
	                                 </a>
	                             </h4>
	                         </div>
	                         <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	                             <div class="panel-body">
	                                 <div class="row">
									    {!! $setting->about_our_mission !!}
                                     </div>
	                             </div>
	                         </div>
	                     </div>
	                     <div class="panel panel-default">
	                         <div class="panel-heading" role="tab" id="headingTwo">
	                             <h4 class="panel-title">
	                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Notre Vision
	                                 </a>
	                             </h4>
	                         </div>
	                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	                             <div class="panel-body">
                                     {!! $setting->about_our_vision !!}
	                             </div>
	                         </div>
	                     </div>
	                     <div class="panel panel-default">
	                         <div class="panel-heading" role="tab" id="headingThree">
	                             <h4 class="panel-title">
	                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Nos Services
	                                 </a>
	                             </h4>
	                         </div>
	                         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	                             <div class="panel-body">
                                     {!! $setting->about_our_service !!}
                                 </div>
	                         </div>
	                     </div>
	                  </div>
                  </div>
					</div>
				</div>
			</div>
		</div>

@endsection
