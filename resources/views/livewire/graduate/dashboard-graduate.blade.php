<div>
    <x-slot name="title">
        Tablero
    </x-slot>

    <x-slot name="header">
        Tablero de Egresado
    </x-slot>

    @if (Auth::user()->is_new_user == null)
    <div class="row d-flex justify-content-sm-center">
        <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        @php $school = env('SCHOOL'); @endphp
                        <img class="img-circle" src="{{asset("image/school/$school/logo.png")}}"
                            alt="User Image">
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
                    <p class="text-justify">Estimado Egresado:<br />
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

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_one_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.one') }}" title="Perfil del egresado">
                        <img src="{{asset('image/school/sn1.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Perfil del egresado.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_two_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.two') }}" title="Pertinencia y disponibilidad">
                        <img src="{{ asset('image/school/sn2.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Pertinencia y disponibilidad de medio y recursos para el aprendizaje.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_three_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.three') }}" title="Ubicación laboral de los egresados">
                        <img src="{{ asset('image/school/sn3.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Ubicación laboral de los egresados.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_four_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.four') }}" title="Desempeño profesional de los egresados">
                        <img src="{{ asset('image/school/sn4.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Desempeño profesional de los egresados.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_five_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.five') }}" title="Expectativas de desarrollo">
                        <img src="{{ asset('image/school/sn5.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Expectativas de desarrollo, superación profesional y de actualización.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_six_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.six') }}" title="Participación social de los egresados">
                        <img src="{{ asset('image/school/sn6.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Participación social de los egresados.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! $this->checkSurvey('survey_seven_done') !!}
                    </div>
                    <a href="{{ route('graduate.survey.seven') }}" title="Comentarios y sugerencias">
                        <img src="{{ asset('image/school/sn7.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Comentarios y sugerencias.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>