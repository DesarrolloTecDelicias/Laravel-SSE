<div>
    <x-header title="Tablero" header="Tablero de Empresas" />

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
                        <img class="img-circle" src="{{asset('image/school/' . $school . '/logo.png')}}" alt="User Image">
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
                        asegurar la pertinencia de los conocimientos adquiridos y mejorar sistemáticamente, para
                        colaborar en la formación integral
                        de nuestros alumnos. <br />
                        Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por
                        este medio solicitamos tu
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
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <x-survey-card survey='Datos generales de la empresa u organismo.' :number="1"
                    :icon="$this->checkSurvey('survey_one_company_done')" route='company.survey.one' />

                <x-survey-card survey='Ubicación laboral de los egresados.' :number="2"
                    :icon="$this->checkSurvey('survey_two_company_done')" route='company.survey.two' />

                <x-survey-card survey='Competencias laborales.' :number="3"
                    :icon="$this->checkSurvey('survey_three_company_done')" route='company.survey.three' />
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>