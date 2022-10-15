<div>
    <x-slot name="title">
        Tablero
    </x-slot>

    <x-slot name="header">
        Tablero de Empresas
    </x-slot>

    @if (Auth::user()->is_new_user == null)
    @php
    $school = env('SCHOOL');
    @endphp
    <div class="row d-flex justify-content-sm-center">
        <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        @php $school = env('SCHOOL'); @endphp
                        <img class="img-circle" src="{{asset("image/school/$school/logo.png")}}" alt="User Image">
                        <span class="username">Bienvenido</span>
                        <span class="description">Comunicado oficial</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- post text -->
                    <p class="text-justify">Estimado Empleador:<br />
                        Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua para
                        asegurar
                        la pertinencia de
                        los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en la formación integral
                        de
                        nuestros alumnos. <br />
                        Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por
                        este
                        medio solicitamos tu
                        valiosa participación y cooperación en esta investigación del Seguimiento de Egresados, que nos
                        permitirá obtener
                        información valiosa para analizar la problemática del mercado laboral y sus características, así
                        como las competencias
                        laborales de nuestros egresados.<br />
                        Las respuestas del cuestionario anexo serán tratadas con absoluta confidencialidad y con fines
                        meramente estadísticos.
                    </p>
                    <!-- Attachment -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @endif

    <div class="row">
        <!--
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jobs }}</h3>
                    <p>Empleos publicados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $postulates }}</h3>
                    <p>Postulados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="small-box {!! !$surveyDone ? " bg-success": "bg-danger" !!}">
                <div class="inner">
                    <h3>{{ !$surveyDone ? "Completadas": "Sin completar" }}</h3>
                    <p>Encuestas completadas</p>
                </div>
                <div class="icon">
                    <i class="ion {!! !$surveyDone ? " ion-checkmark": "ion-close-circled" !!} "></i>
                        </div>
                        <a href=" #" class="small-box-footer">Más información <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>-->

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container-image">
                        <div class="container-loader">
                            {!! $this->checkSurvey('survey_one_company_done') !!}
                        </div>
                        <a href="{{ route('company.survey.one') }}" title="Datos generales">
                            <img src="{{ asset('image/school/sn1.png') }}" />
                        </a>
                        <div class="container-text">
                            <h5>Datos generales de la empresa u organismo.</h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container-image">
                        <div class="container-loader">
                            {!! $this->checkSurvey('survey_two_company_done') !!}
                        </div>
                        <a href="{{ route('company.survey.two') }}" title="Ubicación laboral de los egresados">
                            <img src="{{ asset('image/school/sn2.png') }}" />
                        </a>
                        <div class="container-text">
                            <h5>Ubicación laboral de los egresados.</h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container-image">
                        <div class="container-loader">
                            {!! $this->checkSurvey('survey_three_company_done') !!}
                        </div>
                        <a href="{{ route('company.survey.three') }}" title="Competencias laborales">
                            <img src="{{ asset('image/school/sn3.png') }}" />
                        </a>
                        <div class="container-text">
                            <h5>Competencias laborales.</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>