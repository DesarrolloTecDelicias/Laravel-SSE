<div>
    <x-header title="Estadísticas Perfil del Egresado" />

    <div>
        <x-filter-chart :careers="$careers" :selected="$careerSelected" />

        <div class="row">
            <x-chart-component idChart="sex" description="Sexo" title="sexo" lg="6" md="6" />

            <x-chart-component idChart="marital_status" description="Estado Civil" title="estado_civil" lg="6" md="6" />

            <x-chart-component idChart="qualified" description="¿El egresado está títulado?" title="titulado" lg="6"
                md="6" />

            <x-chart-component idChart="month" description="Período de egreso" title="periodo_egreso" lg="6" md="6" />

            <x-chart-component idChart="year" description="Año de egreso" title="anio_egreso" />

            <x-chart-component idChart="state" description="Estado" title="estado" />

            <x-chart-component idChart="career_id" description="Carreras de los egresados" title="carreras_egresados" />

            <x-chart-component idChart="specialty_id" description="Especialidad de los egresados"
                title="especialidad_egresados" />

            <x-chart-component idChart="percent_english" description="Porcentaje de inglés" title="porcentaje_ingles" />
        </div>
    </div>


    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chart.js';    

            const arr = @php echo $query; @endphp;
            const barOptions = ['year','state', 'career_id', 'specialty_id', 'percent_english'];
            const careersData = @php echo json_encode($careersData); @endphp;
            const specialtiesData = @php echo json_encode($specialtiesData); @endphp;
            const properties = @php echo json_encode($properties); @endphp;
            for (let property of properties) {
                let output;
                if (property === 'career_id') {
                    output = getObjectExtra(property, arr, careersData);
                } else if(property === 'specialty_id'){
                    output = getObjectExtra(property, arr, specialtiesData);
                } 
                else {
                    output = getObject(property, arr);
                }
                const validateChart = barOptions.includes(property);
                window[property+'Chart'] = new ChartSSE(property,validateChart? 'bar' : 'pie', output);              
            }

            window.addEventListener('updateChartCustom', async (event) => {
                event.preventDefault();
                const array = event.detail.data;
                const properties = event.detail.properties;
                for (let property of properties) {
                    let output;
                    if (property === 'career_id') {
                        output = getObjectExtra(property, array, careersData);
                    } else if(property === 'specialty_id'){
                        output = getObjectExtra(property, array, specialtiesData);
                    } 
                    else {
                        output = getObject(property, array);
                    }
                    const ref = window[property+'Chart'];
                    ref.updateChart(output)
                }
            })              
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