<div>
    <x-slot name="title">
        Tablero
    </x-slot>

    <x-slot name="header">
        Tablero de Administrador
    </x-slot>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $allUsers }}</h3>
                    <p>Egresados registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('configuration.graduates') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $allCompanies }}</h3>
                    <p>Empresas registradas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="{{ route('configuration.companies') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $surveyOneCount }}</h3>
                    <p>Perfil del Egresado respondidas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="{{ route('report.graduate.survey.one') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $surveysPercentage }}%</h3>

                    <p>% con 7 encuestas respondidas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('configuration.graduates.surveys') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $newUsers }}</h3>
                    <p>Usuarios Nuevos(Mes Actual)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plus"></i>
                </div>
                <a href="{{ route('configuration.graduates') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $relation }}%</h3>
                    <p>Relación de Perfil del Egresado</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark"></i>
                </div>
                <a href="{{ route('report.graduate.survey.one') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $careerCount }}</h3>
                    <p>{{ $career }}+ Egresados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-book"></i>
                </div>
                <a href="{{ route('configuration.graduates') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $notUsers }}</h3>
                    <p>Usuarios sin registros</p>
                </div>
                <div class="icon">
                    <i class="ion ion-sad"></i>
                </div>
                <a href="{{ route('configuration.graduates.surveys') }}" class="small-box-footer">Más información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- DONUT CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Carrera de los egresados</h3>

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

                    <canvas id="careerChart" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">¿Qué es lo que están haciendo los egresados?</h3>

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
                    <canvas id="doForLiving" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col (LEFT) -->

        <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- PIE CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Calidad de los docentes según los egresados</h3>

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
                    <canvas id="qualityChart" width="685" height="312"
                        class="chartjs-render-monitor pie-style"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Sexo de los egresados</h3>
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
                    <canvas id="sexChart" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row (main row) -->

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chart.js';
        
        const chartsData = @php echo $json; @endphp;
        const { career, sex, quality, doForLiving } = chartsData;
        new ChartSSE('careerChart', 'doughnut', career);
        new ChartSSE('doForLiving', 'pie', doForLiving);
        new ChartSSE('qualityChart', 'pie', quality);
        new ChartSSE('sexChart', 'doughnut', sex);

        // window.addEventListener('updateChart', async (event) => {
        //     event.preventDefault();
        //     careerD.updateChart(sex);
        //     one.updateChart();
        //     two.updateChart();
        //     three.updateChart();
        // })
    </script>

    @endsection
</div>