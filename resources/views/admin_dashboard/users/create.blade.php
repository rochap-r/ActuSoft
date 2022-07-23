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
                <div class="breadcrumb-title pe-3">Utilisateurs</div>
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
                            <a class="dropdown-item" href="{{route('admin.users.index')}}">Voir les utilisateurs</a>
                            <a class="dropdown-item" href="{{route('admin.users.create')}}">Créer un Utilisateur</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Ajouter un nouveau Utilisateur</h5>
                    <hr/>
                    <form action="{{ route('admin.users.store') }}" method="POST" id="post_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="input_name" class="form-label">Nom Utilisateur</label>
                                            <input id="name" required class="form-control" name="name" id="input_name">
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_email" class="form-label">Email Utilisateur</label>
                                            <input id="email" type="email" required class="form-control" name="email" id="input_email" >
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="input_image" class="form-label">Image Utilisateur</label>
                                            <input id="image" type="file" required class="form-control" name="image"  id="input_image">
                                            @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_password" class="form-label">Mot de passe</label>
                                            <input id="input_password" type="password" required class="form-control" name="password">
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Role d'utilisateur</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="border p-3 rounded">
                                                        <div class="mb-3">
                                                            <select class="single-select" name="role_id" >
                                                                @foreach($roles as $key=>$role)
                                                                    <option value="{{ $key }}">{{ $role }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('role_id')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Ajouter Un Utilisateur</button>
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
