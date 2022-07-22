
@extends("admin_dashboard.layouts.app")
@section('style')
    <style>
        .perrmissions{
            background-color: white;
            border: 0.5px solid black;
            border-radius: 10px;
            width: 90%;
            color: black;
            padding: 5px 10px;
            text-align: justify;
            display: inline-block;
            font-size: 15px;
            margin: 10px 10px;
            cursor: pointer;
        }
    </style>
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Roles</div>
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
                    <h5 class="card-title">Modifier le Role: {{ $role->name}}</h5>
                    <hr/>
                    <form action="{{ route('admin.roles.update',$role) }}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Nom du role</label>
                                            <input type="text" value="{{ old('name',$role->name) }}" name="name" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="inputProductTitle" class="form-label text-uppercase lead">Les Permissions pour chaque role</label>
                                                @php
                                                    $the_count=count($permissions);
                                                    $start=0;
                                                @endphp
                                                @for($j=1; $j<=3; $j++)
                                                    @php
                                                        $end=round($the_count * ($j / 3));
                                                    @endphp
                                                    <div class="col-md-4">
                                                        @for($i =$start; $i < $end; $i++)
                                                            <label for="per{{$i}}" class="perrmissions">
                                                                <input type="checkbox" {{ $role->permissions->contains($permissions[$i]->id) ? 'checked' : ''  }} id="per{{$i}}" name="permissions[]" value="{{ $permissions[$i]->id }}"> {{ $permissions[$i]->name  }}
                                                            </label>
                                                        @endfor
                                                    </div>
                                                    @php
                                                        $start=$end;
                                                    @endphp
                                                @endfor
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary text-uppercase">mettre à jour</button>
                                        <button onclick="event.preventDefault(); document.getElementById('delete_form_{{ $role->id }}').submit()" class="btn btn-danger text-uppercase">supprrimer le role</button>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form action="{{ route('admin.roles.destroy',$role) }}" method="POST" id="delete_form_{{ $role->id }}">
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
