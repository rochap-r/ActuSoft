<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <h4 class="logo-text"><a href="{{route('home')}}">ACTU-SOFT</a></h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin.index') }}" >
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                        </div>
                        <div class="menu-title">Articles</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.posts.index') }}"><i class="bx bx-right-arrow-alt"></i>Tous les articles</a>
                        </li>
                        <li> <a href="{{ route('admin.posts.create') }}"><i class="bx bx-right-arrow-alt"></i>Nouveau article</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bxs-dice-6 '></i>
                        </div>
                        <div class="menu-title">Catégories</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt"></i>Toutes les Catégories</a>
                        </li>
                        <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Nouvelle Catégorie</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}" >
                        <div class="parent-icon"><i class='bx bxs-purchase-tag'></i></div>
                        <div class="menu-title">Tags</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bxs-comment-dots '></i>
                        </div>
                        <div class="menu-title">Commentaires</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.comments.index') }}"><i class="bx bx-comment-detail"></i>Tous les Commentaires</a>
                        </li>
                        <li> <a href="{{ route('admin.comments.create') }}"><i class="bx bx-comment-add"></i>Nouveau Commentaire</a>
                        </li>

                    </ul>
                </li>

                <hr>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bxs-key '></i>
                        </div>
                        <div class="menu-title">Roles</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.roles.index') }}"><i class="bx bx-arrow-to-right"></i>Tous les Roles</a>
                        </li>
                        <li> <a href="{{ route('admin.roles.create') }}"><i class="bx bx-arrow-to-right"></i>Nouveau Role</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bxs-user '></i>
                        </div>
                        <div class="menu-title">Utilisateurs</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.users.index') }}"><i class="bx bx-arrow-to-right"></i>Tous les utilisateurs</a>
                        </li>
                        <li> <a href="{{ route('admin.users.create') }}"><i class="bx bx-arrow-to-right"></i>Nouveau utilisateur</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.contacts.index') }}" >
                        <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                        <div class="menu-title">Contacts</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.edit') }}" >
                        <div class="parent-icon"><i class='bx bx-abacus'></i></div>
                        <div class="menu-title">Parametre </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <div class="parent-icon"><i class='bx bx-link-external'></i></div>
                        <div class="menu-title">Visitez le site </div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
