<div>
    <x-header title="Estadísticas Ubicación laboral de los egresados" />

    <div>
        <div class="row">
            <x-chart-component idChart="doForLivingChart" description="Actividad que se dedican actualmente los egresados"
                title="que_hacen_actualmente_egresados" />

            <x-chart-component idChart="specialityChart" description="Qué están estudiando los egresados"
                title="estudios_egresados" lg="6" md="6" />

            <x-chart-component idChart="longTakeJobChart" description="Tiempo transcurrido para obtener el primer empleo"
                title="tiempo_primer_empleo" lg="6" md="6" />

            <x-chart-component idChart="countsChart" description="Requisito de contratación"
                title="requisito_contratacion" />                

            <x-chart-component idChart="languageMostSpokenChart" description="Idioma que utiliza en su trabajo actual"
                title="idioma_mas_hablado" lg="6" md="6" />

            <x-chart-component idChart="seniorityChart" description="Antigüedad en el empleo actual"
                title="antiguedad_empleo_actual" lg="6" md="6" />

            <x-chart-component idChart="salaryChart" description="Ingreso (Salario minimo diario)"
                title="ingreso" lg="6" md="6" />

            <x-chart-component idChart="managementLevelChart" description="Nivel jerárquico en el trabajo"
                title="nivel_jerarquico" lg="6" md="6" />                

            <x-chart-component idChart="jobConditionChart" description="Condición de trabajo"
                title="condicion_trabajo" lg="6" md="6" />

            <x-chart-component idChart="jobRelationshipChart" description="Relación del trabajo con su área de formación"
                title="relacion_trabajo_area_formacion" lg="6" md="6" />                
                
            <x-chart-component idChart="businessStructureChart" description="Su empresa u organismo es"
                title="estructura_empresa" lg="6" md="6" />

            <x-chart-component idChart="companySizeChart" description="Tamaño de la empresa u organismo"
                title="tamanio_empresa" lg="6" md="6" />
            
            <x-chart-component idChart="yearChart" description="Año de ingreso al trabajo"
                title="anio_ingreso_trabajo" />

            <x-chart-component idChart="businessActivityChart" description="Actividad económica de la empresa u organismo"
                title="actividad_economica" />                            
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chartOld.js';
            const chartsData = @php echo $json; @endphp;
            const { 
                doForLiving,
                speciality,
                longTakeJob,
                counts,
                languageMostSpoken,
                seniority,
                salary,
                managementLevel,
                jobCondition,
                jobRelationship,
                businessStructure,
                companySize,
                year,
                businessActivity
            } = chartsData;

            const doForLivingChart = new ChartSSE('doForLivingChart', 'pie', doForLiving);
            const specialityChart = new ChartSSE('specialityChart', 'pie', speciality);
            const longTakeJobChart = new ChartSSE('longTakeJobChart', 'pie', longTakeJob);
            const countsChart = new ChartSSE('countsChart', 'bar', counts);
            const languageMostSpokenChart = new ChartSSE('languageMostSpokenChart', 'pie', languageMostSpoken);
            const seniorityChart = new ChartSSE('seniorityChart', 'pie', seniority);
            const salaryChart = new ChartSSE('salaryChart', 'pie', salary);
            const managementLevelChart = new ChartSSE('managementLevelChart', 'pie', managementLevel);
            const jobConditionChart = new ChartSSE('jobConditionChart', 'pie', jobCondition);
            const jobRelationshipChart = new ChartSSE('jobRelationshipChart', 'pie', jobRelationship); 
            const businessStructureChart = new ChartSSE('businessStructureChart', 'pie', businessStructure);
            const companySizeChart = new ChartSSE('companySizeChart', 'pie', companySize);
            const yearChart = new ChartSSE('yearChart', 'bar', year);
            const businessActivityChart = new ChartSSE('businessActivityChart', 'bar', businessActivity);
    </script>

    @endsection

</div>