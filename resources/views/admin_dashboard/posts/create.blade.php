
	@extends("admin_dashboard.layouts.app")

	@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<style>
		.imageuploadfy{
			border:0;
			max-width:100%;
		}
	</style>
	<script src="https://cdn.tiny.cloud/1/s86rdw88nimupgtqnx7gmsk8b6yqfi9bok9bftuoyvnhxykf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Articles</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
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
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Ajouter un nouvel Article</h5>
					  <hr/>
					  <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                       	<div class="form-body mt-4">
							<div class="row">
							   <div class="col-lg-12">
							  	 <div class="border border-3 p-4 rounded">
								   <div class="mb-3">
									<label for="inputProductTitle" class="form-label">Le titre de l'article</label>
									<input type="text" value="{{ old('title') }}" name="title" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
								   @error('title')
									   <p class="text-danger">{{ $message }}</p>
								   @enderror

								   </div>
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Limace d'article (Slug)</label>
									   <input type="text" name="slug" value="{{ old('slug') }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
									   @error('slug')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Extrait d'article</label>
									   <textarea class="form-control"  required id="inputProductDescription" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
									   @error('excerpt')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Catégorie d'article</label>
									   <div class="card">
										   <div class="card-body">
											   <div class="border p-3 rounded">
												   <div class="mb-3">
													   <select class="single-select" name="category_id" >
														   @foreach($categories as $key=>$categorie)
																<option value="{{ $key }}">{{ $categorie }}</option>
														   @endforeach
													   </select>
													   @error('category_id')
													  	 <p class="text-danger">{{ $message }}</p>
													   @enderror
												   </div>
											   </div>
										   </div>
									   </div>
								   </div>
								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Image d'article</label>
									   <input id="image-uploadify" required name="thumbnail" type="file" accept="image/*">
									   @error('thumbnail')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								  <div class="mb-3">

									<label for="inputProductDescription" class="form-label">Contenu d'article</label>
									<textarea id="post_content" required class="form-control" name="body" id="inputProductDescription" rows="3">{{ old('body') }}</textarea>
									@error('body')
									 	<p class="text-danger">{{ $message }}</p>
									@enderror
								  </div>
								   <button type="submit" class="btn btn-primary text-uppercase">Ajouter Nouvel Article</button>
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
	<script src="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
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
		tinymce.init({
                selector: '#post_content',
                plugins: 'image autolink lists table ',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                height:'500',
                image_title:true,
                automatic_upload:true, //le navigateur ne se lance pas pour uploadez l'image

                images_upload_handler: function(blobinfo,success,failure){
                    let formData= new FormData();
					let _token= $('input[name="_token"]').val();
					let xhr=new XMLHttpRequest();
					xhr.open('post',"{{ route('admin.upload_tinymce_image') }}")
					xhr.onload=()=>{
						if(xhr.status !== 200)
						{
							failure("Http Error "+xhr.status);
							return
						}
						let json=JSON.parse(xhr.responseText)
						if(! json || typeof json.location!=='string'){
							failure("Invalid json: "+xhr.responseText);
							return
						}
						success(json.location)
					}
					formData.append('_token',_token);
					formData.append('file',blobinfo.blob(),blobinfo.filename());

					xhr.send(formData);
                },

                file_picker_types: 'image',

                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {

                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

        });


        // tinymce.init(
        //     {
        //         selector:'#post_content',
		// 		plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
		// 		toolbar: 'a11ycheck addcomment showcomments casechange checklist  export formatpainter code image link editimage pageembed permanentpen table tableofcontents',
        //         //plugins:'advlist autolink links image charmap print preview hr anchor pagebraek',
        //         toolbar_mode:'floating',
		// 		height:'500',
		// 		tinycomments_mode: 'embedded',
		// 		tinycomments_author: 'Author name',
		// 		//toolbar:'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr table',
		// 		image_title: true,
		// 		automatic_uploads: true,
		// 		images_upload_handler: function(blobinfo,success,failure)
		// 		{
		// 			console.log(blobinfo.blob())
		// 		}
        //     }
        // )
		setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
	</script>
	@endsection
