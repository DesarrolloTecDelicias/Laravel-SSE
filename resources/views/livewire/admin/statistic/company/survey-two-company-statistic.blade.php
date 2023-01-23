<div>
    <x-header title="Estadísticas Ubicación laboral de los egresados" />

    <div>
        <div class="row">
            <x-chart-component idChart="numberGraduatesChart"
                description="Número de profesionistas con nivel de licenciatura que laboran en la empresa u organismo"
                title="numero_profesionistas" />

            <x-chart-component idChart="careersChart"
                description="Número de egresados del Instituto Tecnológico y nivel jerárquico que ocupan en su organización"
                title="numero_egresados" />

            <x-chart-component idChart="congruenceChart"
                description="Congruencia entre perfil profesional y función que desarrollan los egresados del Instituto Tecnológico en su empresa u organización"
                title="congruencia_perfil_funcion" />

            <x-chart-component idChart="countsChart"
                description="Requisito que establece para la contratación de personal a nivel licenciatura."
                title="requisito_contratacion" />

            <x-chart-component idChart="mostDemandedCareerChart"
                description="Carrera que demanda preferentemente su empresa u organismo" title="carrera_demandada" />
        </div>
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chartOld.js';      
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