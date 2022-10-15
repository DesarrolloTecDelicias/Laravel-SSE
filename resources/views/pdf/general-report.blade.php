<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset ("image/school/$school/favicon.ico")}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <title>Reporte General</title>

    <!-- AdminLTE Template Styles -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/css/adminlte.min.css">

    <style>
        @media print {
            #buttonPrint {
                visibility: hidden;
                display: none;
                height: 0;
                widows: 0;
            }

            .bg-tec.text-white,
            .bg-tec.text-white.text-center.w-25 th {
                background-color: #1f3d6d !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

</head>

@php
function returnPercentText($value) { return ($value ? $value : '0') . '%'; }

function textClass($value, $comparativeValue)
{
return 'text-dark';
}

function sub($a, $b) { return intval($a) - intval($b); }

function drawTitle($title) { return "<tr>
    <td colspan=\" 4\" class=\"bg-tec text-white text-bold\">$title</td>
</tr>";
}

function drawColumn($title, $description = "", $stateValue = "", $number = 0, $invert = 0)
{
$column = "<tr>
    <td>$title</td>";
    if ($description) {
    $column .= "<td class=\"text-justify\">$description</td>";
    $column .= "<td class=\"align-middle text-center\">
        <span contenteditable>" . returnPercentText($stateValue) . "</span>
    </td>";
    if ($invert) {
    $column .= "<td class=\"align-middle text-center " . textClass($number, $stateValue) . " \">
        <span contenteditable>" . sub($number, $stateValue) . "</span>
    </td>";
    } else {
    $column .= "<td class=\"align-middle text-center " . textClass($stateValue, $number) . " \">
        <span contenteditable>" . sub($stateValue, $number) . "</span>
    </td>";
    }
    } else {
    $column .="<td class=\"align-middle text-center\">S/D.</td>
    <td class=\"align-middle text-center\">S/D.</td>
    <td class=\"align-middle text-center\">S/D.</td>";
    }
    $column .= "
</tr>";

return $column;
}

function drawChartColumn($id, $title, $colspan = 1)
{
return "<td class=\"align-middle\" colspan=\"$colspan\">
    <div class=\"d-flex justify-content-center flex-wrap\">
        <span class=\"w-100 text-center text-bold\">$title</span>
        <div class=\"chartjs-size-monitor\">
            <div class=\"chartjs-size-monitor-expand\">
                <div class=\"\"></div>
            </div>
            <div class=\"chartjs-size-monitor-shrink\">
                <div class=\"\"></div>
            </div>
        </div>
        <canvas id=\"$id\" width=\"150\" height=\"150\" class=\"chartjs-render-monitor pie-style w-100 h-100\"></canvas>
    </div>
</td>";
}

@endphp


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center" id="buttonPrint">
                    <div class="col-6 d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-lg buttonPrint my-2"
                            onclick="window.print()">IMPRIMIR
                            REPORTE</button>
                    </div>
                </div>
                <div class="row d-flex justify-content-between my-3 px-3">
                    <div class="d-flex justify-content-center flex-column w-75">
                        <h2 class="my-auto">{{ ucwords(env('SCHOOL_NAME')) }}</h2>
                        <h5 class="mt-2">Fecha de corte: <span class="text-bold">{{ $state['dataFilterStart']
                                }}</span> a:
                            <span class="text-bold">{{ $state['dataFilterEnd'] }}</span>
                        </h5>
                        <h6>Carrera(s): @foreach ($state['careers'] as $key => $career)
                            <span class="text-bold">{{ $career }}@if(!($key ==
                                array_key_last($state['careers']))){!!","!!}@endif</span>
                            @endforeach
                        </h6>
                    </div>
                    <div class="d-flex justify-content-end w-25">
                        @php $school = env('SCHOOL'); @endphp
                        <img src="{{asset ('image/school/TecNM.png')}}" class="mx-1" width="190" height="70" alt="">
                        <img src="{{asset("image/school/$school/logo.png")}}" class="mx-3" width="60"
                            height="70" alt="">
                    </div>
                </div>
                <table class="table table-responsive table-bordered w-100">
                    <thead>
                        <tr class="bg-tec text-white text-center w-25">
                            <th class="align-middle" scope="col">VARIABLES E INDICADORES</th>
                            <th class="align-middle" scope="col">PARÁMETROS</th>
                            <th class="align-middle" scope="col">VALOR OBTENIDO</th>
                            <th class="align-middle" scope="col">VALIDACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Survey One --}}
                        {!! drawTitle("I. PERFIL DEL EGRESADO") !!}
                        <tr>
                            <td colspan="4">I.1 Datos personales y académicos del egresado</td>
                        </tr>

                        {{-- Survey Two --}}
                        {!! drawTitle("II. PERTINENCIA Y DISPONIBILIDAD DE
                        MEDIOS Y RECURSOS PARA EL APRENDIZAJE") !!}

                        {!! drawColumn("II.1 Calidad de los docentes",
                        "Que al menos el 75% de los egresados califique como \"Muy Buena\" la calidad de los
                        docentes.",
                        $state['quality_teachers'], 75) !!}

                        {!! drawColumn("II.2 Plan de Estudios",
                        "Que al menos el 75% de los egresados califique como \"Muy Buenos\" la cantidad y calidad de
                        los Planes de Estudio.",
                        $state['syllabus'], 75) !!}

                        {!! drawColumn("II.3 Oportunidad de participar en proyectos de investigación y desarrollo",
                        "Que al menos el 50% de los egresados califique como \"muy buenas\" las oportunidades.",
                        $state['participate_projects'], 50) !!}

                        {!! drawColumn("II.4 Énfasis que se le prestaba a la investigación dentro del proceso de
                        enseñanza-aprendizaje",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" la orientación hacia la
                        investigación.",
                        $state['study_emphasis'], 50) !!}

                        {!! drawColumn("II.5 ¿Qué conocimientos del idioma inglés tenía en el año en el que
                        egresó?",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" el dominio de este
                        idioma, en un 60%.",
                        $state['percent_english'], 50) !!}

                        {!! drawColumn("II.6 Satisfacción con las condiciones de estudio (infraestructura)",
                        "Al menos que el 75% de los egresados califique como \"Muy Buena\" la infraestructura
                        disponible en la institución.",
                        $state['study_condition'], 75) !!}

                        {!! drawColumn("II.7 Experiencia obtenida a través de la Residencia Profesional",
                        "Al menos que el 90% de los egresados deben calificar como \"Muy Buena\" la experiencia
                        obtenida
                        en la Residencia Profesional.",
                        $state['experience'], 90) !!}

                        @if ($json)
                        <!---- First charts ---->
                        <!-- First row -->
                        <tr>
                            {!! drawChartColumn("qualityTeachersChart", "Calidad de los docentes") !!}
                            {!! drawChartColumn("syllabusChart", "Plan de Estudios") !!}
                            {!! drawChartColumn("participateProjectsChart",
                            "Oportunidad de participar en proyectos", 2) !!}
                        </tr>

                        <!-- Second row -->
                        <tr>
                            {!! drawChartColumn("studyEmphasisChart",
                            "Énfasis que se le prestaba a la investigación") !!}
                            {!! drawChartColumn("studyConditionChart",
                            "Satisfacción con las condiciones de estudio") !!}
                            {!! drawChartColumn("experienceChart",
                            "Experiencia obtenida a través de la Residencia", 2) !!}
                        </tr>

                        <!-- Three row -->
                        <tr style="height:150px !important;">
                            <td colspan="4" class="align-middle" style="height:150px !important;">
                                <div class="d-flex justify-content-center flex-wrap">
                                    <span class="w-100 text-center text-bold">Conocimientos del idioma inglés</span>
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="englishChart"
                                        class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                                </div>
                            </td>
                        </tr>
                        <!-- End first charts -->
                        @endif

                        {{-- Survey Three --}}
                        {!! drawTitle("III. UBICACIÓN LABORAL DE LOS EGRESADOS") !!}

                        {!! drawColumn("III.1 Tiempo transcurrido para obtener el primer empleo relacionado con su
                        carrera",
                        "Al menos el 60% de los egresados deben estar trabajando a un año de su egreso.",
                        $state['long_take_job'], 60) !!}

                        {!! drawColumn("III.2 Medio para obtener el empleo",
                        "Al menos el 10% de los egresados deben recibir apoyo de la bolsa del trabajo del
                        Instituto.",
                        $state['hear_about'], 10) !!}

                        {!! drawColumn("III.3 Trabajo actual",
                        "Al menos el 60% de los egresados deben estar trabajando.",
                        $state['working'], 60) !!}

                        {!! drawColumn("III.4 Antigüedad en el empleo") !!}
                        {!! drawColumn("III.5 Ingreso (salario mínimo diario)") !!}

                        {!! drawColumn("III.6 Nivel jerárquico en el trabajo",
                        "Al menos el 70% de los egresados deben ocupar puestos de mando intermedio y superior.",
                        $state['management_level'], 70) !!}

                        {!! drawColumn("III.7 Requisitos de contratación") !!}
                        {!! drawColumn("III.8 Datos de la empresa u organismo") !!}
                        {!! drawColumn("III.9 Sector económico de la organización") !!}
                        {!! drawColumn("III.10 Giro o actividad principal de la empresa u organización") !!}
                        {!! drawColumn("III.11 Tamaño de la empresa u organización") !!}


                        @if ($json)
                        <!---- Second charts ---->
                        <!-- First row -->
                        <tr>
                            {!! drawChartColumn("longTakeJobChart",
                            "Tiempo transcurrido para obtener el primer empleo") !!}
                            {!! drawChartColumn("hearAboutChart",
                            "Medio para obtener el empleo", 3) !!}
                        </tr>
                        <tr>
                            {!! drawChartColumn("workTimeChart",
                            "Trabajo actual") !!}
                            {!! drawChartColumn("managementLevelChart",
                            "Nivel jerárquico en el trabajo",3) !!}
                        </tr>
                        <!-- End Second charts -->
                        @endif


                        {{-- Survey Four --}}
                        {!! drawTitle("IV. DESEMPEÑO PROFESIONAL (Coherencia
                        entre la formación y el tipo de empleo)") !!}

                        {!! drawColumn("IV.1 Eficiencia para realizar las actividades laborales, en relación con su
                        formación académica",
                        "Al menos, el 70% de los egresados deben reportar que su formación académica les permite
                        desempeñarse eficientemente.",
                        $state['efficiency_work_activities'], 70) !!}

                        {!! drawColumn("IV.2 Relación del trabajo con su área de formación académica",
                        "Al menos, el 90% de los egresados deben reportar que utilizan los conocimientos y
                        habilidades que se adquirieron durante los estudios.",
                        $state['job_relationship'], 90) !!}

                        {!! drawColumn("IV.3 Aspectos de valoración para obtener el empleo",
                        "Como máximo, un 10% de los egresados debe reportar carencias en cada uno de los aspectos
                        que se les presentaron.",
                        $state['valorization'], 10, 1) !!}

                        {!! drawColumn("IV.4 Utilidad de las residencias profesionales o prácticas profesionales
                        para el desarrollo laboral y profesional",
                        "Al menos el 30% de los egresados debe reportar la utilidad de las residencias profesionales
                        para la obtención de empleo, como muy buenas.",
                        $state['usefulness_professional_residence'], 30) !!}

                        {!! drawColumn("IV.5 Deficiencias en su formación profesional para realizar las actividades
                        laborales",
                        "Como máximo el 10% de los egresados debe reportar deficiencias en su formación.",
                        $state['academic_training'], 10, 1) !!}

                        @if ($json)
                        <!---- Third charts ---->
                        <!-- First row -->
                        <tr>
                            {!! drawChartColumn("efficiencyWorkActivitiesChart",
                            "Eficiencia para realizar las actividades laborales") !!}
                            {!! drawChartColumn("jobRelationshipChart",
                            "Relación del trabajo con su área de formación académica", 3) !!}
                        </tr>
                        <tr>
                            {!! drawChartColumn("usefulnessProfessionalResidenceChart",
                            "Utilidad de las residencias profesionales o prácticas profesionales") !!}
                            {!! drawChartColumn("academicTrainingChart",
                            "Deficiencias en su formación profesional para realizar las actividades laborales", 3)
                            !!}
                        </tr>
                        <!-- End Third charts -->
                        @endif


                        {{-- Survey Five --}}
                        {!! drawTitle("V. EXPECTATIVAS DE DESARROLLO,
                        SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN") !!}

                        {!! drawColumn("V.1 Titulación",
                        "Al menos el 50% de los egresados deben estar titulados en el primer año de egreso.",
                        $state['qualified'], 50) !!}

                        {!! drawColumn("V.2 Estudios actuales de posgrado",
                        "Al menos el 5% de los egresados debe continuar estudios de posgrado.",
                        $state['do_for_living'], 5) !!}

                        {!! drawColumn("V.3 Requerimiento de estudios de capacitación y/o actualización") !!}

                        @if ($json)
                        <!---- Fourth charts ---->
                        <!-- First row -->
                        <tr>
                            {!! drawChartColumn("qualifiedChart", "Titulación") !!}
                            {!! drawChartColumn("doForLivingChart", "Estudios actuales de posgrado", 3) !!}
                        </tr>
                        <!-- End Fourth charts -->

                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- AdminLTE Template Scripts -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('template')}}/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="{{asset('template')}}/plugins/chart.js/Chart.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{asset('template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Toastr -->
    <script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>

    <!-- daterangepicker -->
    <script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('template')}}/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <!-- Summernote -->
    <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="{{asset('template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>

    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/js/adminlte.js"></script>

    <!-- Random Color  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    @if ($json)
    <script type="module">
        import ChartSSE from '/js/chart.js';        
                const chartsData = @php echo $json; @endphp;
                const {
                    english,
                    qualified,
                    qualityTeachers,
                    syllabus,
                    participateProjects,
                    studyEmphasis,
                    studyCondition,
                    experience,
                    doForLiving,
                    longTakeJob,
                    workTime,
                    hearAbout,
                    managementLevel,
                    efficiencyWorkActivities,
                    jobRelationship,
                    usefulnessProfessionalResidence,
                    academicTraining
                } = chartsData;
        
                const qualityTeachersChart = new ChartSSE('qualityTeachersChart', 'pie', qualityTeachers);
                const syllabusChart = new ChartSSE('syllabusChart', 'pie', syllabus);
                const participateProjectsChart = new ChartSSE('participateProjectsChart', 'pie', participateProjects);
                const studyEmphasisChart = new ChartSSE('studyEmphasisChart', 'pie', studyEmphasis);
                const englishChart = new ChartSSE('englishChart', 'bar', english);
                const studyConditionChart = new ChartSSE('studyConditionChart', 'pie', studyCondition);
                const experienceChart = new ChartSSE('experienceChart', 'pie', experience);
        
                const qualifiedChart = new ChartSSE('qualifiedChart', 'pie', qualified);
                const doForLivingChart = new ChartSSE('doForLivingChart', 'pie', doForLiving);
                const longTakeJobChart = new ChartSSE('longTakeJobChart', 'pie', longTakeJob);
                const workTimeChart = new ChartSSE('workTimeChart', 'pie', workTime);
                const hearAboutChart = new ChartSSE('hearAboutChart', 'pie', hearAbout);
                const managementLevelChart = new ChartSSE('managementLevelChart', 'pie', managementLevel);
                
                const efficiencyWorkActivitiesChart = new ChartSSE('efficiencyWorkActivitiesChart', 'pie', efficiencyWorkActivities);
                const jobRelationshipChart = new ChartSSE('jobRelationshipChart', 'pie', jobRelationship);
                const usefulnessProfessionalResidenceChart = new ChartSSE('usefulnessProfessionalResidenceChart', 'pie', usefulnessProfessionalResidence);
                const academicTrainingChart = new ChartSSE('academicTrainingChart', 'pie', academicTraining);
                
        
                    // window.addEventListener('updateChart', async (event) => {
                    //     event.preventDefault();
                    //     careerD.updateChart(sex);
                    //     one.updateChart();
                    //     two.updateChart();
                    //     three.updateChart();
                    // })
    </script>

    @endif
</body>

</html>