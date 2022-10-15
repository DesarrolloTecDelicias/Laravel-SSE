<div>
    <x-slot name="title">
        Desempeño profesional Estadísticas
    </x-slot>

    <x-slot name="header">
        Estadísticas Desempeño profesional de los egresados
    </x-slot>

    <div>
        <div class="row d-flex justify-content-center mb-4">
            <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Eficiencia para realizar las actividades laborales, en relación con su
                            formación académica</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="efficiencyWorkActivitiesChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Cómo califica su formación académica con respecto a su desempeño laboral
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="academicTrainingChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Utilidad de las residencias profesionales o prácticas profesionales para
                            su desarrollo laboral y profesional</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="usefulnessProfessionalResidenceChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- BAR CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Aspectos que valora la empresa u organismo para la contratación de
                            egresados. Promedios</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="averagesArrayChart" width="685" height="312"
                            class="chartjs-render-monitor bar-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row w-100 alert alert-primary d-flex justify-content-center">
            <span>Aspectos que valora la empresa u organismo para la contratación de egresados, donde 1 es poco y 5 es mucho.<br />
                Pésimo (1), Malo (2), Regular (3), Bueno (4) y Excelente (5)
            </span>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Área o campo de estudio</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="studyAreaChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Titulación</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="titleChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Experiencia Laboral / Práctica (antes de egresar)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="experienceChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo
                            en equipo, etc</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="jobCompetenceChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Posicionamiento de la Institución de Egreso</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="positioningChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (LEFT) -->

            <div class="col-lg-6 col-md-12 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Conocimiento de Idiomas Extranjeros</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="languagesChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Recomendaciones / Referencias</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="recommendationsChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Personalidad / Actitudes</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="personalityChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Capacidad de liderazgo</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="leadershipChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Otros</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="othersChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chart.js';
                    
            const chartsData = @php echo $json; @endphp;
            const { 
                efficiencyWorkActivities,
                academicTraining,
                usefulnessProfessionalResidence,
                averagesArray,
                studyArea,
                title,
                experience,
                jobCompetence,
                positioning,
                languages,
                recommendations,
                personality,
                leadership,
                others,
            } = chartsData;

            console.log(averagesArray);
            console.log(jobCompetence);

            const efficiencyWorkActivitiesChart = new ChartSSE('efficiencyWorkActivitiesChart', 'pie', efficiencyWorkActivities);
            const academicTrainingChart = new ChartSSE('academicTrainingChart', 'pie', academicTraining);
            const usefulnessProfessionalResidenceChart = new ChartSSE('usefulnessProfessionalResidenceChart', 'pie', usefulnessProfessionalResidence);
            const averagesArrayChart = new ChartSSE('averagesArrayChart', 'bar', averagesArray);
            const studyAreaChart = new ChartSSE('studyAreaChart', 'pie', studyArea);
            const titleChart = new ChartSSE('titleChart', 'pie', title);
            const experienceChart = new ChartSSE('experienceChart', 'pie', experience);
            const jobCompetenceChart = new ChartSSE('jobCompetenceChart', 'pie', jobCompetence);
            const positioningChart = new ChartSSE('positioningChart', 'pie', positioning);
            const languagesChart = new ChartSSE('languagesChart', 'pie', languages);
            const recommendationsChart = new ChartSSE('recommendationsChart', 'pie', recommendations);
            const personalityChart = new ChartSSE('personalityChart', 'pie', personality);
            const leadershipChart = new ChartSSE('leadershipChart', 'pie', leadership);
            const othersChart = new ChartSSE('othersChart', 'pie', others);       
    </script>

    @endsection

</div>