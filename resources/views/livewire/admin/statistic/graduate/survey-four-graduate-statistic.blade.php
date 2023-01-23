<div>
    <x-header title="Estadísticas Desempeño profesional de los egresados" />    

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />

        <div class="row">
            <x-chart-component idChart="efficiency_work_activities" description="Eficiencia para realizar las actividades laborales, en relación con su formación académica"
                title="eficiencia" lg="4" md="6" sm="12" />

            <x-chart-component idChart="academic_training" description="Cómo califica su formación académica con respecto a su desempeño laboral"
                title="formacion" lg="4" md="6" sm="12" />
                
            <x-chart-component idChart="usefulness_professional_residence" description="Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional"
                title="utilidad_residencia" lg="4" md="6" sm="12" />                          
                
            {{-- <x-chart-component idChart="averagesArrayChart" description="Aspectos que valora la empresa u organismo para la contratación de egresados. Promedios"
                title="promedios_aspectos" /> --}}
        </div>

        <div class="row w-100 alert alert-dark d-flex justify-content-center text-center">
            <span>Aspectos que valora la empresa u organismo para la contratación de egresados, donde 1 es poco y 5 es
                mucho.<br />
                Pésimo (1), Malo (2), Regular (3), Bueno (4) y Excelente (5)
            </span>
        </div>

        <div class="row">
            <x-chart-component idChart="study_area" description="Área o campo de estudio"
                title="area_estudio" lg="6" />

            <x-chart-component idChart="title" description="Titulación"
                title="titulacion" lg="6" />

            <x-chart-component idChart="experience" description="Experiencia Laboral / Práctica (antes de egresar)"
                title="experiencia_laboral" lg="6" />

            <x-chart-component idChart="job_competence" description="Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en equipo, etc"
                title="competencia_laboral" lg="6" />

            <x-chart-component idChart="positioning" description="Posicionamiento de la Institución de Egreso"
                title="posicionamiento_institucion" lg="6" />

            <x-chart-component idChart="languages" description="Conocimiento de Idiomas Extranjeros"
                title="lenguajes_extranjeros" lg="6" />

            <x-chart-component idChart="recommendations" description="Recomendaciones / Referencias"
                title="recomendaciones" lg="6" />

            <x-chart-component idChart="personality" description="Personalidad / Actitudes"
                title="personalidad" lg="6" />

            <x-chart-component idChart="leadership" description="Capacidad de liderazgo"
                title="capacidad_liderazgo" lg="6" />

            <x-chart-component idChart="others" description="Otros"
                title="otros" lg="6" />
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