
@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    {{-- css pour les tags--}}
    <link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.5/tinymce.min.js" integrity="sha512-TXT0EzcpK/3KaFksZ59D/1A3orhVtDzhwgtYeSIGxM6ZgCW1+ak+2BqbJPps2JQlkvRApI37Xqbr8ligoIGjBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edition d'article</li>
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
                    <h5 class="card-title">Edition de l'article: {{ $post->title }}</h5>
                    <hr/>
                    <form action="{{ route('admin.posts.update',$post) }}" method="POST" enctype="multipart/form-data" id="post_form_{{ $post->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le titre de l'article</label>
                                            <input type="text" value="{{ old('title',$post->title) }}" name="title" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Limace d'article (Slug)</label>
                                            <input type="text" name="slug" value="{{ old('slug',$post->slug) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
                                            @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Extrait d'article</label>
                                            <textarea class="form-control"  required id="inputProductDescription" name="excerpt" rows="3">{{ old('excerpt',$post->excerpt) }}</textarea>
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
                                                                    <option {{ $post->category_id===$key ? 'selected':'' }} value="{{ $key }}">{{ $categorie }}</option>
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
                                            <label class="form-label">Tags de l'article</label>
                                            <input type="text" class="form-control" value="{{ $tags }}" name="tags" data-role="tagsinput">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label for="inputProductDescription" class="form-label">Image d'article</label>
                                                            <input id="image-uploadify"  name="thumbnail" type="file" accept="image/*">
                                                            @error('thumbnail')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <img width="240" src="{{ $post->image ? asset('storage/'.$post->image->path.'') : asset('storage/placeholders/article-placeholder.jpg') }}" class="img-responsive" alt="Image d'article">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Contenu d'article</label>
                                            <textarea id="post_content" required class="form-control" name="body" id="inputProductDescription" rows="3">{{ old('body',str_replace('jpeg','jpg',str_replace('../../', '../../../', $post->body))) }}</textarea>
                                            @error('body')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="approved" class="form-check-input" id="flexSwitchCheckChecked" {{ $post->approved ? 'checked':''}}>
                                                <label for="flexSwitchCheckChecked" class="form-check-label {{ $post->approved ? 'text-success':'text-danger' }}">{{ $post->approved ? 'Approuvé':'Non Approuvé' }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button onclick="event.preventDefault(); document.getElementById('post_form_{{ $post->id }}').submit()" class="btn btn-primary text-uppercase">Editer l'Article</button>&nbsp&nbsp&nbsp
                                            <button onclick="event.preventDefault(); document.getElementById('delete_form_{{ $post->id }}').submit()" class="btn btn-danger text-uppercase">supprrimer l'article</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form action="{{ route('admin.posts.destroy',$post) }}" method="POST" id="delete_form_{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
    <script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')}}"></script>
    {{-- script indispensble pour les tags--}}
    <script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js')}}"></script>
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

            tinymce.init({
                selector: '#post_content',
                plugins:'advlist autolink link image charmap print preview hr anchor pagebraek indent code autolink table lists',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | hr charmap table',
                toolbar_mode: 'floating',
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
                }

            });

            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        })

    </script>
@endsection
