
@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Catégories</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mise à jour</li>
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
                    <h5 class="card-title">Modifier la categorie: {{ $category->name }}</h5>
                    <hr/>
                    <form action="{{ route('admin.categories.update',$category) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Nom de la catégorie</label>
                                            <input type="text" value="{{ old('name',$category->name) }}" name="name" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Limace de la catégorie (Slug)</label>
                                            <input type="text" name="slug" value="{{ old('slug',$category->slug) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
                                            @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary text-uppercase">Mettre à jour la Catégorie</button> &nbsp&nbsp&nbsp&nbsp
                                        <button onclick="event.preventDefault(); document.getElementById('delete_form_{{ $category->id }}').submit()" class="btn btn-danger text-uppercase">supprrimer la categorie</button>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form action="{{ route('admin.categories.destroy',$category) }}" method="POST" id="delete_form_{{ $category->id }}">
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
    <script>
        $(document).ready(function () {
            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        })
    </script>
@endsection
