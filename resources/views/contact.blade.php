@extends('main_layouts.main')
@section('title', 'Actu-Soft  | Contact')
@section('content')

		<div class="colorlib-contact">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-12 animate-box">
						<h2>Nos informations de contact</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="contact-info-wrap-flex">
									<div class="con-info">
										<p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Contactez-nous</h2>
					</div>
					<div class="col-md-6">
                        {{--flash message--}}
                        <x-blog.message :status="'success'"/>
						<form method="POST" autocomplete="off" action="{{ route('contact.store') }}">
                            @csrf
							<div class="row form-group">
								<div class="col-md-6">
									<!-- <label for="fname">First Name</label> -->
									<x-blog.form.input name="first_name" placeholder="Votre Prénom" value="{ {old('first_name') }}"/>
								</div>
								<div class="col-md-6">
									<!-- <label for="lname">Last Name</label> -->
                                    <x-blog.form.input name="last_name" placeholder="Votre Postnom" value="{{ old('last_name') }}"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
                                    <x-blog.form.input type="email" name="email" placeholder="Votre Adresse email" value="{{ old('email') }}"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="subject">Subject</label> -->
                                    <x-blog.form.input name="subject" required='false' placeholder="Objet du message" value="{{ old('subject') }}"/>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="message">Message</label> -->
                                    <x-blog.form.textarea name="message" value="{{ old('message') }}"/>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<div id="map" class="colorlib-map"></div>
					</div>
				</div>
			</div>
		</div>

@endsection


