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
                <img src="{{ Auth::user()->profile_photo_url }}"
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
                        <x-nav-item route='graduate.survey.one' :routename="$routeName" title="1. Perfil del Egresado" />                        
                        <x-nav-item route='graduate.survey.two' :routename="$routeName" title="2. Pertinencia y Disponibilidad" />
                        <x-nav-item route='graduate.survey.three' :routename="$routeName" title="3. Ubicación Laboral" />
                        <x-nav-item route='graduate.survey.four' :routename="$routeName" title="4. Desempeño Profesional" />
                        <x-nav-item route='graduate.survey.five' :routename="$routeName" title="5. Expectativas y actualización" />
                        <x-nav-item route='graduate.survey.six' :routename="$routeName" title="6. Participación social" />
                        <x-nav-item route='graduate.survey.seven' :routename="$routeName" title="7. Comentarios y sugerencias" />
                    </ul>
                </li>
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