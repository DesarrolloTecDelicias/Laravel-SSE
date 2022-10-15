<div>
    <x-slot name="title">
        Expéctativas de desarrollo Estadísticas
    </x-slot>

    <x-slot name="header">
        Estadísticas Expéctativas de desarrollo, superación profesional y de actualización
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
                        <h3 class="card-title">¿Le gustaria tomar cursos de actualización?</h3>
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
                        <canvas id="coursesYesNoChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-12">
                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">¿Le gustaria tomar algún posgrado?</h3>
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
                        <canvas id="masterYesNoChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="accordion" class="pb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="card w-75 text-dark">
                            <div class="card-header bg-gray-dark">
                                <a class="card-link text-light" data-toggle="collapse" href="#collapseOne">
                                    Cursos que interesan a los egresados
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body text-justify">
                                    <ul class="description-style d-flex justify-content-between flex-wrap">
                                        @foreach ($courses as $option)
                                        <li class="w-50">{{ $option->courses }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="card w-75 text-dark">
                            <div class="card-header bg-gray-dark">
                                <a class="collapsed card-link text-light" data-toggle="collapse" href="#collapseTwo">
                                    Posgrado que interesan a los egresados
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body text-justify">
                                    <ul class="description-style d-flex justify-content-between flex-wrap">
                                        @foreach ($master as $option)
                                        <li class="w-50">{{ $option->master }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
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
                coursesYesNo,
                masterYesNo,
            } = chartsData;

            const coursesYesNoChart = new ChartSSE('coursesYesNoChart', 'pie', coursesYesNo);
            const masterYesNoChart = new ChartSSE('masterYesNoChart', 'pie', masterYesNo);    
    </script>

    @endsection

</div>