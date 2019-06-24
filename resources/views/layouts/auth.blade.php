@include('includes.head')
    @php
        $userRole = null;
        switch(Auth::user()->role->name) {
            case 'Administrateur':
                $userRole = 'admin';
                break;
            case 'Etudiant':
                $userRole = 'student';
                break;
            case 'Enseignant':
                $userRole = 'teacher';
                break;
        }
    @endphp
    @include('includes.auth-header-navbar')
    @include('includes.auth-aside-navbar')
    <main id="app" class="auth-zone text-dark p-3">
        @yield('content')
    </main>
@include('includes.foot')