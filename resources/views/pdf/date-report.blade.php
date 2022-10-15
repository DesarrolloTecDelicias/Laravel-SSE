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

    <title>Reporte General {{ $dateState['career'] }}</title>

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
return $value - $comparativeValue < 0 ? 'text-danger' : ($value - $comparativeValue==0 ? 'text-info' : 'text-success' );
    } @endphp <body class="hold-transition sidebar-mini layout-fixed">
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
                    <div class="d-flex justify-content-center flex-column">
                        <h2 class="my-auto">{{ ucwords(env('SCHOOL_NAME')) }}</h2>
                        <h5 class="mt-2">Fecha de corte: <span class="text-bold">{{ $dateState['dataFilterStart'] }}</span>
                            a:
                            <span class="text-bold">{{ $dateState['dataFilterEnd'] }}</span>
                        </h5>
                        <h5>Carrera: <span class="text-bold">{{ $dateState['career'] }}</span></h5>
                    </div>
                    <div class="d-flex justify-content-center">
                        @php $school = env('SCHOOL'); @endphp
                        <img src="{{asset ('image/school/TecNM.png')}}" class="mx-1" width="190" height="70" alt="">
                        <img src="{{asset("image/school/$school/logo.png")}}" class="mx-3" width="60" height="70" alt="">
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
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">I. PERFIL DEL EGRESADO</td>
                        </tr>
                        <tr>
                            <td colspan="4">I.1 Datos personales y académicos del egresado</td>
                        </tr>

                        {{-- Survey Two --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">II. PERTINENCIA Y DISPONIBILIDAD DE
                                MEDIOS Y RECURSOS PARA EL APRENDIZAJE</td>
                        </tr>
                        <tr>
                            <td>II.1 Calidad de los docentes</td>
                            <td class="text-justify">Que al menos el 75% de los egresados califique como "Muy Buena" la
                                calidad de los docentes.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['quality_teachers']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['quality_teachers'], 75) !!}">
                                <span contenteditable>{{$dateState['quality_teachers'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.2 Plan de Estudios</td>
                            <td class="text-justify">Que al menos el 75% de los egresados califique como "Muy Buenos" la
                                cantidad y calidad de los Planes de Estudio.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['syllabus']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['syllabus'], 75) !!}">
                                <span contenteditable>{{$dateState['syllabus'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.3 Oportunidad de participar en proyectos de investigación y desarrollo</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy buenas"
                                las oportunidades.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['participate_projects'])
                                    }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['participate_projects'], 50) !!}">
                                <span contenteditable>{{$dateState['participate_projects'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.4 Énfasis que se le prestaba a la investigación dentro del proceso de
                                enseñanza-aprendizaje</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy bueno" la
                                orientación hacia la investigación.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['study_emphasis']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['study_emphasis'], 50) !!}">
                                <span contenteditable>{{$dateState['study_emphasis'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.5 ¿Qué conocimientos del idioma inglés tenía en el año en el que egresó?</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy bueno" el
                                dominio de este idioma, en un 60%.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['percent_english']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['percent_english'], 50) !!}">
                                <span contenteditable>{{$dateState['percent_english'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.6 Satisfacción con las condiciones de estudio (infraestructura)</td>
                            <td class="text-justify">Al menos que el 75% de los egresados califique como "Muy Buena" la
                                infraestructura disponible en la institución.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['study_condition']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['study_condition'], 75) !!}">
                                <span contenteditable>{{$dateState['study_condition'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.7 Experiencia obtenida a través de la Residencia Profesional</td>
                            <td class="text-justify">Al menos que el 90% de los egresados deben calificar como "Muy
                                Buena" la experiencia obtenida en la Residencia Profesional.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['experience']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['experience'], 90) !!}">
                                <span contenteditable>{{$dateState['experience'] - 90 }}</span>
                            </td>
                        </tr>

                        {{-- Survey Three --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">III. UBICACIÓN LABORAL DE LOS EGRESADOS
                            </td>
                        </tr>
                        <tr>
                            <td>III.1 Tiempo transcurrido para obtener el primer empleo relacionado con su carrera</td>
                            <td class="text-justify">Al menos el 60% de los egresados deben estar trabajando a un año de
                                su egreso.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['long_take_job']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['long_take_job'], 60) !!}">
                                <span contenteditable>{{$dateState['long_take_job'] - 60 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.2 Medio para obtener el empleo</td>
                            <td class="text-justify">Al menos el 10% de los egresados deben recibir apoyo de la bolsa
                                del trabajo del Instituto.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['hear_about']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['hear_about'], 10) !!}">
                                <span contenteditable>{{$dateState['hear_about'] - 10 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.3 Trabajo actual</td>
                            <td class="text-justify">Al menos el 60% de los egresados deben estar trabajando.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['working']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['working'], 60) !!}">
                                <span contenteditable>{{$dateState['working'] - 60 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.4 Antigüedad en el empleo</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.5 Ingreso (salario mínimo diario)</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.6 Nivel jerárquico en el trabajo</td>
                            <td class="text-justify">Al menos el 70% de los egresados deben ocupar puestos de mando
                                intermedio y superior.</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>III.7 Requisitos de contratación</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.8 Datos de la empresa u organismo</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.9 Sector económico de la organización</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.10 Giro o actividad principal de la empresa u organización</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.11 Tamaño de la empresa u organización</td>
                            <td class="align-middle text-center">Micro, pequeña, mediana o gran empresa.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>

                        {{-- Survey Four --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">IV. DESEMPEÑO PROFESIONAL (Coherencia
                                entre la formación y el tipo de empleo)</td>
                        </tr>
                        <tr>
                            <td>IV.1 Eficiencia para realizar las actividades laborales, en relación con su formación
                                académica</td>
                            <td class="text-justify">Al menos, el 70% de los egresados deben reportar que su formación
                                académica les permite desempeñarse eficientemente.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['efficiency_work_activities'])
                                    }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! textClass($dateState['efficiency_work_activities'], 70) !!}">
                                <span contenteditable>{{$dateState['efficiency_work_activities'] - 70 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.2 Relación del trabajo con su área de formación académica</td>
                            <td class="text-justify">Al menos, el 90% de los egresados deben reportar que utilizan los
                                conocimientos y habilidades que se adquirieron durante los estudios.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['job_relationship']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['job_relationship'], 90) !!}">
                                <span contenteditable>{{$dateState['job_relationship'] - 90 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.3 Aspectos de valoración para obtener el empleo</td>
                            <td class="text-justify">Como máximo, un 10% de los egresados debe reportar carencias en
                                cada uno de los aspectos que se les presentaron.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['valorization']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass(10, $dateState['valorization']) !!}">
                                <span contenteditable>{{10-$dateState['valorization'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.4 Utilidad de las residencias profesionales o prácticas profesionales para el
                                desarrollo laboral y profesional</td>
                            <td class="text-justify">Al menos el 30% de los egresados debe reportar la utilidad de las
                                residencias profesionales para la obtención de empleo, como muy buenas.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{
                                    returnPercentText($dateState['usefulness_professional_residence'])
                                    }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! textClass($dateState['usefulness_professional_residence'], 30) !!}">
                                <span contenteditable>{{$dateState['usefulness_professional_residence'] - 30 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.5 Deficiencias en su formación profesional para realizar las actividades laborales
                            </td>
                            <td class="text-justify">Como máximo el 10% de los egresados debe reportar deficiencias en
                                su formación.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['academic_training']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass(10, $dateState['academic_training']) !!}">
                                <span contenteditable>{{10-$dateState['academic_training'] }}</span>
                            </td>
                        </tr>

                        {{-- Survey Five --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">V. EXPECTATIVAS DE DESARROLLO,
                                SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN</td>
                        </tr>
                        <tr>
                            <td>V.1 Titulación</td>
                            <td class="text-justify">Al menos el 50% de los egresados deben estar titulados en el primer
                                año de egreso.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['qualified']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['qualified'], 50) !!}">
                                <span contenteditable>{{$dateState['qualified'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>V.2 Estudios actuales de posgrado</td>
                            <td class="text-justify">Al menos el 5% de los egresados debe continuar estudios de
                                posgrado.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ returnPercentText($dateState['do_for_living']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! textClass($dateState['do_for_living'], 5) !!}">
                                <span contenteditable>{{$dateState['do_for_living'] - 5 }}</span>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-left">V.3 Requerimiento de estudios de capacitación y/o actualización</td>
                            <td class="align-middle">S/D.</td>
                            <td class="align-middle">S/D.</td>
                            <td class="align-middle">S/D.</td>
                        </tr>
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
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/js/adminlte.js"></script>
    </body>

</html>