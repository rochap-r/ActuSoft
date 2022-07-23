@extends("admin_dashboard.layouts.app")

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
                            <li class="breadcrumb-item active" aria-current="page">Tous les Utilisateurs</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="{{route('admin.users.index')}}">Voir les utilisateurs</a>
                            <a class="dropdown-item" href="{{route('admin.users.create')}}">Nouveau utilisateur</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                        </div>
                        <div class="ms-auto"><a href="{{route('admin.users.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Créer un Utilisateur</a></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>UTIL#</th>
                                <th>Image Utilisateur</th>
                                <th>Nom Utilisateur</th>
                                <th>Email Utilisateur</th>
                                <th>Role Utilisateur</th>
                                <th>Date de Création</th>
                                <th>Articles Rélatifs</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">CAT#-{{ $user->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img width="60" src="{{ $user->image ? asset('storage/'.$user->image->path) : asset('storage/placeholders/user_placeholder.png') }}" alt="{{ $user->image->name??'' }}">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>

                                    <td>{{ $user->created_at->diffForHumans() }}</td>

                                    <td>
                                        <a href="{{ route('admin.users.show',$user) }}" class="btn btn-primary btn-sm"> Articles Rélatifs </a>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.users.edit',$user) }}" class="text-warning"><i class='bx bxs-edit'></i></a>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $user->id }}').submit()" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>
                                            <form action="{{ route('admin.users.destroy',$user) }}" id="delete_form_{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
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
