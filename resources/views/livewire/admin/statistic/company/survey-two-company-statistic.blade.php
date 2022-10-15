<div>
    <x-slot name="title">
        Ubicación laboral Estadísticas
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Número de profesionistas con nivel de licenciatura que laboran en la
                            empresa u organismo</h3>
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
                        <canvas id="numberGraduatesChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Número de egresados del Instituto Tecnológico y nivel jerárquico que
                            ocupan en su organización</h3>
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
                        <canvas id="careersChart" width="685" height="312"
                            class="chartjs-render-monitor bar-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Congruencia entre perfil profesional y función que desarrollan los
                            egresados del Instituto Tecnológico en su empresa u organización</h3>
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
                        <canvas id="congruenceChart" width="685" height="312"
                            class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Número de egresados del Instituto Tecnológico y nivel jerárquico que
                            ocupan en su organización</h3>
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

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Carrera que demanda preferentemente su empresa u organismo</h3>
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
                        <canvas id="mostDemandedCareerChart" width="685" height="312"
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
                counts,
                careers,
                numberGraduates,
                congruence,
                mostDemandedCareer,
            } = chartsData;

            const numberGraduatesChart = new ChartSSE('numberGraduatesChart', 'pie', numberGraduates);
            const careersChart = new ChartSSE('careersChart', 'bar', careers);
            const congruenceChart = new ChartSSE('congruenceChart', 'pie', congruence);
            const countsChart = new ChartSSE('countsChart', 'bar', counts);
            const mostDemandedCareerChart = new ChartSSE('mostDemandedCareerChart', 'pie', mostDemandedCareer);

    </script>

    @endsection

</div>