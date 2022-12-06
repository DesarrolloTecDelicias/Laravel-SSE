<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" title="SSE ITD" class="brand-link">
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
                <a href="{{ route('admin.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ $routeName == 'admin.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/catalogo') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'catalogo' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Catálogo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('catalogue.business') }}"
                                class="nav-link {!! $routeName == 'catalogue.business' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'catalogue.business' ? 'fa-dot-circle'
                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Actividad económica</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('catalogue.career') }}"
                                class="nav-link {!! $routeName == 'catalogue.career' ? 'active' : ''!!}">
                                <i class="far {!! $routeName == 'catalogue.career' ? 'fa-dot-circle'
                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Carreras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('catalogue.specialty') }}"
                                class="nav-link {!! $routeName == 'catalogue.specialty' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'catalogue.specialty' ? 'fa-dot-circle'
                                        : 'fa-circle' !!} nav-icon"></i>
                                <p>Especialidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('catalogue.language') }}"
                                class="nav-link {!! $routeName == 'catalogue.language' ? 'active' : ''!!}">
                                <i class="far {!! $routeName == 'catalogue.language' ? 'fa-dot-circle'
                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Lenguaje</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/correo') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'correo' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Correo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('email.advice') }}"
                                class="nav-link {!! $routeName == 'email.advice' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'email.advice' ? 'fa-dot-circle'
                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Aviso egresados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('email.advice.company') }}"
                                class="nav-link {!! $routeName == 'email.advice.company' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'email.advice.company' ? 'fa-dot-circle'
                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Aviso empresas</p>
                            </a>
                        </li>                        
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/configuracion') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'configuracion' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('configuration.graduates.surveys') }}"
                                class="nav-link {!! $routeName == 'configuration.graduates.surveys' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'configuration.graduates.surveys' 
                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Egresados Encuestas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('configuration.graduates') }}"
                                class="nav-link {!! $routeName == 'configuration.graduates' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'configuration.graduates' 
                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administrar Egresados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('configuration.company.surveys') }}"
                                class="nav-link {!! $routeName == 'configuration.company.surveys' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'configuration.company.surveys' 
                                                                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Empresas Encuestas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('configuration.companies') }}"
                                class="nav-link {!! $routeName == 'configuration.companies' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'configuration.companies' 
                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administrar Empresas</p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('configuration.administrators') }}"
                                class="nav-link {!! $routeName == 'configuration.administrators' ? 'active' : '' !!}">
                                <i
                                    class="far  {!! $routeName == 'configuration.administrators' 
                                                                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administrar Comité</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/reporte') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'reporte' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Reportes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="display: {!! str_contains($prefix, 'administrador/reporte') ? 'block' : 'none' !!};">
                        <li class="nav-item {!! $this->openMenu('reporte/egresado') !!}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p class="ml-1">
                                    Egresado
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {!! str_contains($prefix, 'reporte/egresado') ? 'block' : 'none' !!};">
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.one') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'perfil', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'perfil', 'icon') !!} nav-icon"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'pertinencia', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'pertinencia', 'icon') !!} nav-icon"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'ubicacion', 'icon') !!} nav-icon"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.four') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'desempeno', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'desempeno', 'icon') !!} nav-icon"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.five') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'expectativas', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'expectativas', 'icon') !!} nav-icon"></i>
                                        <p>5. Expectativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.six') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'participacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'participacion', 'icon') !!} nav-icon"></i>
                                        <p>6. Participación</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.seven') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'comentarios', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'comentarios', 'icon') !!} nav-icon"></i>
                                        <p>7. Comentarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview"
                        style="display: {!! str_contains($prefix, 'administrador/reporte') ? 'block' : 'none' !!};">
                        <li class="nav-item {!! $this->openMenu('reporte/empresa') !!}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-building nav-icon"></i>
                                <p class="ml-1">
                                    Empresas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {!! str_contains($prefix, 'reporte/empresa') ? 'block' : 'none' !!};">
                                <li class="nav-item">
                                    <a href="{{ route('report.company.survey.one') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/empresa', 'datos', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'datos', 'icon') !!} nav-icon"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.company.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/empresa', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'ubicacion', 'icon') !!} nav-icon"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.company.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/empresa', 'competencias', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'competencias', 'icon') !!} nav-icon"></i>
                                        <p>3. Competencias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <li class="nav-item {!! $this->openMenu('administrador/estadistica') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'estadistica' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Estadísticas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="display: {!! str_contains($prefix, 'administrador/estadistica') ? 'block' : 'none' !!};">
                        <li class="nav-item {!! $this->openMenu('estadistica/egresado') !!}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p class="ml-1">
                                    Egresado
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {!! str_contains($prefix, 'estadistica/egresado') ? 'block' : 'none' !!};">
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.one') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'perfil', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'perfil', 'icon') !!} nav-icon"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'pertinencia', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'pertinencia', 'icon') !!} nav-icon"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'ubicacion', 'icon') !!} nav-icon"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.four') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'desempeno', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'desempeno', 'icon') !!} nav-icon"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.five') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'expectativas', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'expectativas', 'icon') !!} nav-icon"></i>
                                        <p>5. Expectativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.six') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'participacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'participacion', 'icon') !!} nav-icon"></i>
                                        <p>6. Participación</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview"
                        style="display: {!! str_contains($prefix, 'administrador/estadistica') ? 'block' : 'none' !!};">
                        <li class="nav-item {!! $this->openMenu('estadistica/empresa') !!}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-building nav-icon"></i>
                                <p class="ml-1">
                                    Empresas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {!! str_contains($prefix, 'estadistica/empresa') ? 'block' : 'none' !!};">
                                <li class="nav-item">
                                    <a href="{{ route('statistic.company.survey.one') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/empresa', 'datos', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'datos', 'icon') !!} nav-icon"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.company.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/empresa', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'ubicacion', 'icon') !!} nav-icon"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.company.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/empresa', 'competencias', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'competencias', 'icon') !!} nav-icon"></i>
                                        <p>3. Competencias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/metodologia') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'metodologia' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-journal-whills"></i>
                        <p>
                            Metodología
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('methodology.general') }}"
                                class="nav-link {!! $routeName == 'methodology.general' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'methodology.general' ? 'fa-dot-circle'
                                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Fecha cohorte</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('methodology.general.statistics') }}"
                                class="nav-link {!! $routeName == 'methodology.general.statistics' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'methodology.general.statistics' ? 'fa-dot-circle'
                                                                                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Fecha corte gráficas</p>
                            </a>
                        </li> --}}
                        <!--<li class="nav-item">
                            <a href="{{ route('methodology.date') }}"
                                class="nav-link {!! $routeName == 'methodology.date' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'methodology.date' ? 'fa-dot-circle'
                                                                                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Fecha contestación</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('methodology.date.statistics') }}"
                                class="nav-link {!! $routeName == 'methodology.date.statistics' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'methodology.date.statistics' ? 'fa-dot-circle'
                                                                                                                                                            : 'fa-circle' !!} nav-icon"></i>
                                <p>Fecha contestación gráficas</p>
                            </a>
                        </li>-->
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}"
                        class="nav-link {{ $routeName == 'admin.profile' ? 'active' : '' }}">
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
        <a id="helpAdmin" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>