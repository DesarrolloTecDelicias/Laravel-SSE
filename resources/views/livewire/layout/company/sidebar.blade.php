<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('company.dashboard') }}" title="SSE ITD" class="brand-link">
        <img src="{{asset('image/school/schooliconwhite.png')}}" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('SCHOOL_U_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ empty(Auth::user()->profile_photo_path) 
                ? Auth::user()->profile_photo_url 
                : url("storage/".Auth::user()->profile_photo_path)}}"
                class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('company.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href=" {{ route('company.dashboard') }} " class="nav-link 
                    {{ $routeName == 'company.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>
                <li class="nav-item {!! $this->openMenu('empresa/encuesta') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'encuesta' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Encuestas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('company.survey.one') }}" class="nav-link 
                            {!! $routeName == 'company.survey.one' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'company.survey.one' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>1. Datos generales de la empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.survey.two') }}" class="nav-link 
                            {!! $routeName == 'company.survey.two' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'company.survey.two' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>2. Ubicación Laboral del Egresado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.survey.three') }}" class="nav-link 
                            {!! $routeName == 'company.survey.three' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'company.survey.three' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>3. Competencias Laborales</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--<li class="nav-item {!! $this->openMenu('empresa/empleo') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'empleo' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Empleos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link 
                                {!! $routeName == 'company.job.view' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'company.job.view' 
                                     ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Lista de empleos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link 
                                {!! $routeName == 'company.job.postulate' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'company.job.postulate' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Ver postulados</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="nav-item">
                    <a href="{{ route('company.profile') }}"
                        class="nav-link {{ $routeName == 'graduate.profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="{{ route('logout') }}" class="btn btn-link text-light"><i class="fas fa-sign-out-alt"></i></a>
        <a id="helpCompany" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>