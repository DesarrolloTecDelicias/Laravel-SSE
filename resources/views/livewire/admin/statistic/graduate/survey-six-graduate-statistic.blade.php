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
            <div class="">
                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">¿Pertenece a organizaciones sociales?</h3>
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
                        <canvas id="organizationYesNoChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">¿Pertenece a organismos de profesionistas?</h3>
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
                        <canvas id="agencyYesNoChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- PIE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">¿Pertenece a asociaciones de egresados?</h3>
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
                        <canvas id="associationYesNoChart" width="685" height="312"
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
                                    Organizaciones
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body text-justify">
                                    <ul class="description-style d-flex justify-content-between flex-wrap">
                                        @foreach ($organization as $option)
                                        <li class="w-50">{{ $option->organization }}</li>
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
                                    Organismos profesionales
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body text-justify">
                                    <ul class="description-style d-flex justify-content-between flex-wrap">
                                        @foreach ($agency as $option)
                                        <li class="w-50">{{ $option->agency }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="card w-75 text-dark">
                            <div class="card-header bg-gray-dark">
                                <a class="collapsed card-link text-light" data-toggle="collapse" href="#collapseThird">
                                    Asociaciones
                                </a>
                            </div>
                            <div id="collapseThird" class="collapse" data-parent="#accordion">
                                <div class="card-body text-justify">
                                    <ul class="description-style d-flex justify-content-between flex-wrap">
                                        @foreach ($association as $option)
                                        <li class="w-50">{{ $option->association }}</li>
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
                organizationYesNo,
                agencyYesNo,
                associationYesNo,
            } = chartsData;

            const organizationYesNoChart = new ChartSSE('organizationYesNoChart', 'pie', organizationYesNo);
            const agencyYesNoChart = new ChartSSE('agencyYesNoChart', 'pie', agencyYesNo);
            const associationYesNoChart = new ChartSSE('associationYesNoChart', 'pie', associationYesNo);    
    </script>

    @endsection

</div>