<div>
    <x-header title="Estadísticas Expéctativas de desarrollo, superación profesional y de actualización" />

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />
        
        <div class="row">
            <x-chart-component idChart="courses_yes_no" description="¿Le gustaria tomar cursos de actualización?"
                title="cursos_actualizacion" />
            <x-chart-component idChart="master_yes_no" description="¿Le gustaria tomar algún posgrado?"
                title="posgrados" />
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