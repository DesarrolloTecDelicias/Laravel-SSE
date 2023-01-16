<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('graduate.dashboard') }}" title="SSE {{ env('SCHOOL_U_NAME') }}" class="brand-link">
        <img src="{{asset('image/school/schooliconwhite.png')}}" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('SCHOOL_U_NAME')}}</span>
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
                <a href="{{ route('graduate.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href=" {{ route('graduate.dashboard') }} " class="nav-link 
                    {{ $routeName == 'graduate.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>
                <li class="nav-item {!! $this->openMenu('egresado/encuesta') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'encuesta' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Encuestas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.one') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.one' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.one' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>1. Perfil del Egresado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.two') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.two' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.two' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>2. Pertinencia y Disponibilidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.three') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.three' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.three' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>3. Ubicación Laboral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.four') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.four' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.four' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>4. Desempeño Profesional</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.five') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.five' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.five' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>5. Expectativas y actualización</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.six') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.six' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.six' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>6. Participación social</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.seven') }}" class="nav-link 
                            {!! $routeName == 'graduate.survey.seven' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'graduate.survey.seven' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>7. Comentarios y sugerencias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--<li class="nav-item">
                    <a href="#" class="nav-link 
                    {{ $routeName == 'graduate.work' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Ofertas de Trabajo</p>
                    </a>
                </li>-->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link 
                    {{ $routeName == 'graduate.pdf' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>Currículum</p>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a href="{{ route('graduate.profile') }}"
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
        <a id="helpGraduate" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>