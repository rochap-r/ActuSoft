
	@extends("admin_dashboard.layouts.app")

	@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />

	<style>
		.imageuploadfy{
			border:0;
			max-width:100%;
		}
	</style>
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Commentaires</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Création</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Actions</a>
                                <a class="dropdown-item" href="{{route('admin.comments.index')}}">Voir les commentaires</a>
                                <a class="dropdown-item" href="{{route('admin.comments.create')}}">Commenter un Artilce</a>
                                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                            </div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Ajouter un nouvel Commentaire</h5>
					  <hr/>
					  <form action="{{ route('admin.comments.store') }}" method="POST" id="post_form">
						@csrf
                       	<div class="form-body mt-4">
							<div class="row">
							   <div class="col-lg-12">
							  	 <div class="border border-3 p-4 rounded">
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Articles à Rélatifs</label>
									   <div class="card">
										   <div class="card-body">
											   <div class="border p-3 rounded">
												   <div class="mb-3">
													   <select class="single-select" name="post_id" >
														   @foreach($posts as $key=>$post)
																<option value="{{ $key }}">{{ $post }}</option>
														   @endforeach
													   </select>
													   @error('post_id')
													  	 <p class="text-danger">{{ $message }}</p>
													   @enderror
												   </div>
											   </div>
										   </div>
									   </div>
								   </div>

								  <div class="mb-3">
									<label for="inputProductDescription" class="form-label">Corps du Commentaire</label>
									<textarea id="post_comment" required class="form-control" name="body" id="inputProductDescription" rows="3">{{ old('body') }}</textarea>
									@error('body')
									 	<p class="text-danger">{{ $message }}</p>
									@enderror
								  </div>
								   <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Ajouter Nouvel Commentaire</button>
								 </div>
							   </div>
						   </div><!--end row-->
						</div>
					  </form>
				  </div>
			  </div>
			</div>
		</div>
		<!--end page wrapper -->
		@endsection

	@section("script")
	<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')}}"></script>
	<script>
		$(document).ready(function () {

            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        })

	</script>
	@endsection
