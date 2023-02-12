<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" title="SSE {{ env('SCHOOL_U_NAME') }}" class="brand-link">
        <img src="{{asset('image/school/schooliconwhite.png')}}" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('SCHOOL_U_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
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
                        <x-nav-item route='catalogue.business' :routename="$routeName" title="Actividad económica" />
                        <x-nav-item route='catalogue.career' :routename="$routeName" title="Carreras" />
                        <x-nav-item route='catalogue.specialty' :routename="$routeName" title="Especialidad" />
                        <x-nav-item route='catalogue.language' :routename="$routeName" title="Lenguaje" />
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
                        <x-nav-item route='email.advice' :routename="$routeName" title="Aviso egresados" />
                        <x-nav-item route='email.advice.company' :routename="$routeName" title="Aviso empresas" />
                    </ul>
                </li>


                <li class="nav-item {!! $this->openMenu('administrador/egresados') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'egresados' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Egresados
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <x-nav-item route='graduates.graduates' :routename="$routeName" title="Administrar Egresados" />
                        <x-nav-item route='graduates.graduates.surveys' :routename="$routeName"
                            title="Encuestas Egresados" />
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/empresas') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'empresas' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Empresas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <x-nav-item route='company.companies' :routename="$routeName" title="Administrar Empresas" />
                        <x-nav-item route='company.company.surveys' :routename="$routeName"
                            title="Empresas Encuestas" />
                        <x-nav-item route='company.agreements' :routename="$routeName" title="Convenios" />
                    </ul>
                </li>

                @if (Auth::user()->role == 'admin')
                <li class="nav-item {!! $this->openMenu('administrador/configuracion') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'configuracion' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <x-nav-item route='configuration.administrators' :routename="$routeName"
                            title="Administradores" />
                    </ul>
                </li>
                @endif

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
                                <i class="fas fa-user-graduate nav-icon pl-2"></i>
                                <p>
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
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'perfil', 'icon') !!} nav-icon pl-2"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'pertinencia', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'pertinencia', 'icon') !!} nav-icon pl-2"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'ubicacion', 'icon') !!} nav-icon pl-2"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.four') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'desempeno', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'desempeno', 'icon') !!} nav-icon pl-2"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.five') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'expectativas', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'expectativas', 'icon') !!} nav-icon pl-2"></i>
                                        <p>5. Expectativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.six') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'participacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'participacion', 'icon') !!} nav-icon pl-2"></i>
                                        <p>6. Participación</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.graduate.survey.seven') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/egresado', 'comentarios', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/egresado', 'comentarios', 'icon') !!} nav-icon pl-2"></i>
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
                                <i class="fas fa-building nav-icon pl-2"></i>
                                <p>
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
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'datos', 'icon') !!} nav-icon pl-2"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.company.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/empresa', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'ubicacion', 'icon') !!} nav-icon pl-2"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.company.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('reporte/empresa', 'competencias', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('reporte/empresa', 'competencias', 'icon') !!} nav-icon pl-2"></i>
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
                                <i class="fas fa-user-graduate nav-icon pl-2"></i>
                                <p>
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
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'perfil', 'icon') !!} nav-icon pl-2"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'pertinencia', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'pertinencia', 'icon') !!} nav-icon pl-2"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'ubicacion', 'icon') !!} nav-icon pl-2"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.four') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'desempeno', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'desempeno', 'icon') !!} nav-icon pl-2"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.five') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'expectativas', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'expectativas', 'icon') !!} nav-icon pl-2"></i>
                                        <p>5. Expectativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.graduate.survey.six') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/egresado', 'participacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/egresado', 'participacion', 'icon') !!} nav-icon pl-2"></i>
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
                                <i class="fas fa-building nav-icon pl-2"></i>
                                <p>
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
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'datos', 'icon') !!} nav-icon pl-2"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.company.survey.two') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/empresa', 'ubicacion', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'ubicacion', 'icon') !!} nav-icon pl-2"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistic.company.survey.three') }}"
                                        class="nav-link {!! $this->thirdLevelValidation('estadistica/empresa', 'competencias', 'active') !!}">
                                        <i
                                            class="far {!! $this->thirdLevelValidation('estadistica/empresa', 'competencias', 'icon') !!} nav-icon pl-2"></i>
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
                        <x-nav-item route='methodology.general' :routename="$routeName" title="Fecha cohorte" />
                        <x-nav-item route='methodology.options' :routename="$routeName" title="Por opciones" />
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