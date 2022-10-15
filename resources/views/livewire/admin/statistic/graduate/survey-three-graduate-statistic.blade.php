<div>
    <x-slot name="title">
        Ubicación Laboral Estadísticas
    </x-slot>

    <x-slot name="header">
        Estadísticas Ubicación laboral de los egresados
    </x-slot>

    <div>
        <div class="row d-flex justify-content-center mb-4">
            <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Actividad que se dedican actualmente los egresados</h3>
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
                        <canvas id="doForLivingChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Qué están estudiando los egresados</h3>
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
                        <canvas id="specialityChart" width="685" height="312"
                            class="chartjs-render-monitor w-100 h-100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Tiempo transcurrido para obtener el primer empleo</h3>
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
                        <canvas id="longTakeJobChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Requisito de contratación</h3>
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
                        <canvas id="countsChart" width="685" height="312"
                            class="chartjs-render-monitor bar-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Idioma que utiliza en su trabajo actual</h3>
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
                        <canvas id="languageMostSpokenChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Antigüedad en el empleo actual</h3>
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
                        <canvas id="seniorityChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Ingreso (Salario minimo diario)</h3>
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
                        <canvas id="salaryChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Nivel jerárquico en el trabajo</h3>
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
                        <canvas id="managementLevelChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Condición de trabajo</h3>
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
                        <canvas id="jobConditionChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Relación del trabajo con su área de formación</h3>
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
                        <canvas id="jobRelationshipChart"
                            style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                            width="685" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Su empresa u organismo es</h3>
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
                        <canvas id="businessStructureChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Tamaño de la empresa u organismo</h3>
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
                        <canvas id="companySizeChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Año de ingreso al trabajo</h3>
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
                            <canvas id="yearChart" width="685" height="312"
                                class="chartjs-render-monitor bar-style w-100 h-100"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actividad económica de la empresa u organismo</h3>
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
                            <canvas id="businessActivityChart" width="685" height="312"
                                class="chartjs-render-monitor bar-style w-100 h-100"></canvas>
                        </div>
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
                doForLiving,
                speciality,
                longTakeJob,
                counts,
                languageMostSpoken,
                seniority,
                salary,
                managementLevel,
                jobCondition,
                jobRelationship,
                businessStructure,
                companySize,
                year,
                businessActivity
            } = chartsData;

            const doForLivingChart = new ChartSSE('doForLivingChart', 'pie', doForLiving);
            const specialityChart = new ChartSSE('specialityChart', 'pie', speciality);
            const longTakeJobChart = new ChartSSE('longTakeJobChart', 'pie', longTakeJob);
            const countsChart = new ChartSSE('countsChart', 'bar', counts);
            const languageMostSpokenChart = new ChartSSE('languageMostSpokenChart', 'pie', languageMostSpoken);
            const seniorityChart = new ChartSSE('seniorityChart', 'pie', seniority);
            const salaryChart = new ChartSSE('salaryChart', 'pie', salary);
            const managementLevelChart = new ChartSSE('managementLevelChart', 'pie', managementLevel);
            const jobConditionChart = new ChartSSE('jobConditionChart', 'pie', jobCondition);
            const jobRelationshipChart = new ChartSSE('jobRelationshipChart', 'pie', jobRelationship); 
            const businessStructureChart = new ChartSSE('businessStructureChart', 'pie', businessStructure);
            const companySizeChart = new ChartSSE('companySizeChart', 'pie', companySize);
            const yearChart = new ChartSSE('yearChart', 'bar', year);
            const businessActivityChart = new ChartSSE('businessActivityChart', 'bar', businessActivity);
    </script>

    @endsection

</div>