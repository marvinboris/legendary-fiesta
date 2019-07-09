<aside class="nav collapse d-lg-block position-fixed font-family-raleway bg-primary-purple text-light border-right shadow-sm px-3 pb-3 align-content-start custom-scrollbar" id="auth-aside-navbar" style="top: 53px; height: calc(100vh - 53px); width: 240px; z-index: 1030;">
    <div class="pt-3">
        <h6 class="text-uppercase small font-weight-thick">Navigation</h6>
        <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
            <li class="nav-item"><a href="{{ route($userRole . '.dashboard') }}" class="nav-link text-light {{ Request::segment(2) === 'dashboard' ? 'active' : null }}"><i class="fa fa-dashboard mr-2"></i>Tableau de bord</a></li>
        </nav>
    </div>
    @if (Auth::user()->isAdmin())
        <div class="pt-3">
            <h6 class="text-uppercase small font-weight-thick">Utilisateurs</h6>
            <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
                <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'users' AND !Request::segment(4)) ? 'active' : null }}"><i class="fa fa-users mr-2"></i>Liste des utilisateurs</a></li>
                <li class="nav-item"><a href="{{ route('admin.users.create') }}" class="nav-link text-light {{ (Request::segment(3) === 'users' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-user-plus mr-2"></i>Ajouter un utilisateur</a></li>
            </nav>
        </div>
        <div class="pt-3">
            <h6 class="text-uppercase small font-weight-thick">Rôles</h6>
            <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
                <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'roles' AND !Request::segment(4)) ? 'active' : null }}"><i class="fa fa-square mr-2"></i>Liste des rôles</a></li>
                <li class="nav-item"><a href="{{ route('admin.roles.create') }}" class="nav-link text-light {{ (Request::segment(3) === 'roles' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-plus-square mr-2"></i>Ajouter un rôle</a></li>
            </nav>
        </div>
        <div class="pt-3">
            <h6 class="text-uppercase small font-weight-thick">Catégories de Permis</h6>
            <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
                <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'categories' AND !Request::segment(4)) ? 'active' : null }}"><i class="fa fa-circle mr-2"></i>Liste des catégories</a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.create') }}" class="nav-link text-light {{ (Request::segment(3) === 'categories' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-plus-circle mr-2"></i>Ajouter une catégorie</a></li>
            </nav>
        </div>
    @endif
    <div class="pt-3">
        <h6 class="text-uppercase small font-weight-thick">Formations</h6>
        <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
            @if (Auth::user()->isAdmin())
                <li class="nav-item"><a href="{{ route('admin.trainings.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'trainings' AND !Request::segment(4)) ? 'active' : null }}"><i class="fa fa-shopping-cart mr-2"></i>Liste des formations</a></li>
                <li class="nav-item"><a href="{{ route('admin.trainings.create') }}" class="nav-link text-light {{ (Request::segment(3) === 'trainings' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-cart-plus mr-2"></i>Ajouter une formation</a></li>
            @else
                <li class="nav-item"><a href="{{ route('trainings.mine.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'trainings' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-cart-arrow-down mr-2"></i>Mes formations</a></li>
                <li class="nav-item"><a href="{{ route('trainings.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'trainings' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-caret-square-o-down mr-2"></i>Souscrire à une formation</a></li>
            @endif
        </nav>
    </div>
    @if (Auth::user()->isAdmin())
        <div class="pt-3">
            <h6 class="text-uppercase small font-weight-thick">Documents</h6>
            <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
                <li class="nav-item"><a href="{{ route('admin.categories.documents.index') }}" class="nav-link text-light {{ (Request::segment(3) === 'documents' AND !Request::segment(4)) ? 'active' : null }}"><i class="fa fa-files-o mr-2"></i>Liste des documents</a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.documents.create') }}" class="nav-link text-light {{ (Request::segment(3) === 'documents' AND Request::segment(4) === 'create') ? 'active' : null }}"><i class="fa fa-file mr-2"></i>Ajouter un document</a></li>
            </nav>
        </div>
    @endif
    <div class="pt-3">
        <h6 class="text-uppercase small font-weight-thick">Profil</h6>
        <nav class="nav flex-column border-left h6 text-white-50 font-weight-lighter">
            <li class="nav-item"><a href="{{ route('profile') }}" class="nav-link text-light {{ Request::segment(2) === 'profile' ? 'active' : null }}"><i class="fa fa-user-circle mr-2"></i>Paramètres du compte</a></li>
        </nav>
    </div>
</aside>