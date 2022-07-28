@extends("admin_dashboard.layouts.app")

@section("style")
    <script src="https://cdn.tiny.cloud/1/s86rdw88nimupgtqnx7gmsk8b6yqfi9bok9bftuoyvnhxykf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb 76 eme video à commencer-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">A-propos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Actions</a>
                            <a class="dropdown-item" href="javascript">Action</a>
                            <a class="dropdown-item" href="javascript">Actions</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Mettre à jour la page A-propos</h5>
                    <hr/>
                    <form action="{{ route('admin.setting.update') }}" method="POST" id="post_form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        {{--   4:34 video 67--}}
                                        <div class="mb-3">
                                            <label for="about_first_text" class="form-label">Top Text</label>
                                            <textarea  required class="form-control" name="about_first_text"  id="about_first_text">
                                                {{ old('about_first_text',$setting->about_first_text) }}
                                            </textarea>
                                            @error('about_first_text')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="about_second_text" class="form-label">Bas Text</label>
                                            <textarea  required class="form-control" name="about_second_text"  id="about_second_text">
                                                {{ old('about_second_text',$setting->about_second_text) }}
                                            </textarea>
                                            @error('about_second_text')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="about_first_image" class="form-label">Première Image</label>
                                                    <input  type="file" required class="form-control" name="about_first_image"  id="about_first_image ">
                                                    @error('about_first_image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$setting->about_first_image) }}" alt="première image">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="about_second_image" class="form-label">Deuxième Image</label>
                                                    <input type="file" required class="form-control" name="about_second_image"  id="about_second_image">
                                                    @error('about_second_image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$setting->about_second_image) }}" alt="deuxième image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="about_our_mission" class="form-label">A-propos Notre Mission</label>
                                            <textarea id="about_our_mission" required class="form-control" name="about_our_mission" rows="3">{{ old('about_our_mission',$setting->about_our_mission) }}</textarea>
                                            @error('about_our_mission')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="about_our_vision" class="form-label">A-propos Notre Vision</label>
                                            <textarea id="about_our_vision" required class="form-control" name="about_our_vision" rows="3">{{ old('about_our_vision',$setting->about_our_vision) }}</textarea>
                                            @error('about_our_vision')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="about_our_service" class="form-label">A-propos Nos Services</label>
                                            <textarea id="about_our_service" required class="form-control" name="about_our_service"  rows="3">{{ old('about_our_service',$setting->about_our_service) }}</textarea>
                                            @error('about_our_service')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour la page A-propos</button>
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
  <script>
        $(document).ready(function () {


            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)

            let initTinyEmce = (id)=>{
                tinymce.init({
                    selector: '#'+id,
                    plugins:'advlist autolink link  charmap print preview hr anchor pagebraek indent code autolink table lists',
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  code | hr charmap table',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    height:'300',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
            }

            initTinyEmce('about_our_mission');
            initTinyEmce('about_our_vision');
            initTinyEmce('about_our_service');
        })

    </script>
@endsection
