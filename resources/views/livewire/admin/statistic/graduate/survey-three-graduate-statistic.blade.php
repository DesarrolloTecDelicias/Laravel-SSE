<div>
    <x-header title="Estadísticas Ubicación laboral de los egresados" />

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />

        <div class="row">
            <x-chart-component idChart="do_for_living" description="Actividad que se dedican actualmente los egresados"
                title="que_hacen_actualmente_egresados" />

            <x-chart-component idChart="long_take_job" description="Tiempo transcurrido para obtener el primer empleo"
                title="tiempo_primer_empleo" lg="6" md="6" />

            {{--
            <x-chart-component idChart="countsChart" description="Requisito de contratación"
                title="requisito_contratacion" /> --}}

            {{--
            <x-chart-component idChart="languages" description="Idioma que utiliza en su trabajo actual"
                title="idioma_mas_hablado" lg="6" md="6" /> --}}

            <x-chart-component idChart="seniority" description="Antigüedad en el empleo actual"
                title="antiguedad_empleo_actual" lg="6" md="6" />

            <x-chart-component idChart="salary" description="Ingreso (Salario minimo diario)" title="ingreso" lg="6"
                md="6" />

            <x-chart-component idChart="management_level" description="Nivel jerárquico en el trabajo"
                title="nivel_jerarquico" lg="6" md="6" />

            <x-chart-component idChart="job_condition" description="Condición de trabajo" title="condicion_trabajo"
                lg="6" md="6" />

            <x-chart-component idChart="job_relationship" description="Relación del trabajo con su área de formación"
                title="relacion_trabajo_area_formacion" lg="6" md="6" />

            <x-chart-component idChart="business_structure" description="Su empresa u organismo es"
                title="estructura_empresa" lg="6" md="6" />

            <x-chart-component idChart="company_size" description="Tamaño de la empresa u organismo"
                title="tamanio_empresa" lg="6" md="6" />

            <x-chart-component idChart="year" description="Año de ingreso al trabajo" title="anio_ingreso_trabajo" />

            {{--
            <x-chart-component idChart="businessActivityChart"
                description="Actividad económica de la empresa u organismo" title="actividad_economica" /> --}}
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
            
            const arr2 = @php echo $query2; @endphp;
            const properties2 = @php echo json_encode($properties2); @endphp;
            for (let property2 of properties2) {
                const output2 = getObject(property2, arr2);
                window[property2+'Chart'] = new ChartSSE(property2, 'pie', output2);
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