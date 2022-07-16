@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tags</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tous les Tags</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="{{route('admin.categories.index')}}">Voir les catégories</a>
                            <a class="dropdown-item" href="{{route('admin.categories.create')}}">Nouvelle Catégorie</a>
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
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>Tag#</th>
                                <th>Nom du Tag</th>
                                <th>Articles Rélatifs</th>
                                <th>Date de Création</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">TAG#-{{ $tag->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $tag->name }}</td>

                                    <td>{{ $tag->created_at->diffForHumans() }}</td>

                                    <td>
                                        <a href="{{ route('admin.tags.show',$tag) }}" class="btn btn-primary btn-sm"> Articles Rélatifs &nbsp&nbsp<span class="badge badge-white">{{ $tag->posts->count() }}</span></a>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $tag->id }}').submit()" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>
                                            <form action="{{ route('admin.tags.destroy',$tag) }}" id="delete_form_{{ $tag->id }}" method="POST">
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
                        {{ $tags->links() }}
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
