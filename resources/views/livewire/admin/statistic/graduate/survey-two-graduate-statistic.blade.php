<div>
    <x-slot name="title">
        Pertinencia y Disponibilidad Estadísticas
    </x-slot>

    <x-slot name="header">
        Estadísticas Pertinencia y disponibilidad de medio y recursos para el aprendizaje
    </x-slot>

    <div>
        <div class="row d-flex justify-content-center mb-4">
            <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
        </div>
        <div class="row" id="print_row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Calidad de los docentes</h3>
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
                        <canvas id="qualityTeachersChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Plan de estudios</h3>
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
                        <canvas id="syllabusChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Satisfacción condiciones de estudio (infraestructura)</h3>
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
                        <canvas id="studyConditionChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Experiencia obtenida a través de la residencia profesional</h3>
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
                </div>

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Énfasis que se le prestaba a la investigación dentro del proceso de
                            enseñanza</h3>
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
                        <canvas id="studyEmphasisChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Oportunidad de participar en proyectos de investigación y
                            desarrollo</h3>
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
                        <canvas id="participateProjectsChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chart.js';
                    
            const chartsData = @php echo $json; @endphp;
            const { 
                qualityTeachers,
                syllabus,
                studyCondition,
                experience,
                studyEmphasis,
                participateProjects
            } = chartsData;
    
            const qualityTeachersChart = new ChartSSE('qualityTeachersChart', 'pie', qualityTeachers);
            const syllabusChart = new ChartSSE('syllabusChart', 'pie', syllabus);
            const studyConditionChart = new ChartSSE('studyConditionChart', 'pie', studyCondition);
            const experienceChart = new ChartSSE('experienceChart', 'pie', experience);
            const studyEmphasisChart = new ChartSSE('studyEmphasisChart', 'pie', studyEmphasis);
            const participateProjectsChart = new ChartSSE('participateProjectsChart', 'pie', participateProjects);
            
    </script>

    @endsection

</div>