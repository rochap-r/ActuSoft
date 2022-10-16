@extends("admin_dashboard.layouts.app")

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
                            <li class="breadcrumb-item active" aria-current="page">Tous les Commentaires</li>
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
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                        </div>
                        <div class="ms-auto"><a href="{{route('admin.comments.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Commenter un Article</a></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>Comtaire#</th>
                                <th>Auteur</th>
                                <th>Commentaire</th>
                                <th>Date de Création</th>
                                <th>Article Rélatif</th>
                                <th>Voir le commentaire</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">COM#-{{ $comment->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $comment->userComment->name }}</td>
                                    <td>{{ \Str::limit($comment->body,50) }}</td>

                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>{{ $comment->post->title }}</td>

                                    <td>
                                        <a href="{{ route('post.show',$comment->post->slug) }}#comment_{{ $comment->id }}" target="_blank" class="btn btn-primary btn-sm"><i class='bx bxs-show'></i>Afficher</a>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.comments.edit',$comment) }}" class="text-warning"><i class='bx bxs-edit'></i></a>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $comment->id }}').submit()" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>
                                            <form action="{{ route('admin.comments.destroy',$comment) }}" id="delete_form_{{ $comment->id }}" method="POST">
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
                        {{ $comments->links() }}
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
