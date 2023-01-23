<div>
    <x-header title="Estadísticas Participación social de los egresados" />

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />

        <div class="row">
            <x-chart-component idChart="organization_yes_no" description="¿Pertenece a organizaciones sociales?"
                title="organizaciones_sociales" />

            <x-chart-component idChart="agency_yes_no" description="¿Pertenece a organismos de profesionistas?"
                title="profesionistas" />

            <x-chart-component idChart="association_yes_no" description="¿Pertenece a asociaciones de egresados?"
                title="asociaciones_egresados" />
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

            const arr = @php echo $query; @endphp;
            const properties = @php echo json_encode($properties); @endphp;
            for (let property of properties) {
                const output = getObject(property, arr);
                window[property+'Chart'] = new ChartSSE(property, 'pie', output);
            }
    </script>

    <script type="text/javascript">
        $(document.body).on("select2:selecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('addCareer', career)
            });
                    
            $(document.body).on("select2:unselecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('removeCareer', career)
            });

            $(document.body).on("select2:selecting", "#surveySelected", (e) => {
                const survey = e.params.args.data.id;
                Livewire.emit('addSurvey', survey)
            });

            $(document.body).on("select2:unselecting", "#surveySelected", (e) => {
                const survey = e.params.args.data.id;
                Livewire.emit('removeSurvey', survey)
            });
    </script>
    @endsection
</div>