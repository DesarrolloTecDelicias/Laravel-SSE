<div>
    <x-header title="Estadísticas Pertinencia y disponibilidad de medio y recursos para el aprendizaje" />

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />
        
        <div class="row">
            <x-chart-component idChart="quality_teachers" description="Calidad de los docentes" title="calidad"
                lg="6" md="6" />

            <x-chart-component idChart="syllabus" description="Plan de estudios" title="plan_estudios" lg="6"
                md="6" />

            <x-chart-component idChart="study_condition"
                description="Satisfacción condiciones de estudio (infraestructura)" title="satisfaccion" lg="6"
                md="6" />

            <x-chart-component idChart="experience"
                description="Experiencia obtenida a través de la residencia profesional" title="experiencia" lg="6"
                md="6" />

            <x-chart-component idChart="study_emphasis"
                description="Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza"
                title="enfasis_investigacion" lg="6" md="6" />

            <x-chart-component idChart="participate_projects"
                description="Oportunidad de participar en proyectos de investigación y desarrollo"
                title="oportunidad_participar" lg="6" md="6" />
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