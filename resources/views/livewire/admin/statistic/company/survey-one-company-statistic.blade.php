<div>
    <x-header title="Estadísticas Datos generales de la empresa u organismo" />

    <div>
        <div class="row">
            <x-chart-component idChart="stateChart" description="Estado" title="estado_empresa" />

            <x-chart-component idChart="companySizeChart" description="Tamaño de la empresa" title="tamanio_empresa" />

            <x-chart-component idChart="businessStructureChart" description="Estructura de la empresa"
                title="estructura" />

            <x-chart-component idChart="businessActivityChart" description="Actividad económica de la empresa"
                title="actvidad_economica" />
        </div>
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chartOld.js';      
            const chartsData = @php echo $json; @endphp;
            const { 
                state,
                businessStructure,
                companySize,
                businessActivity
            } = chartsData;
    
            const stateChart = new ChartSSE('stateChart', 'pie', state);
            const businessStructureChart = new ChartSSE('businessStructureChart', 'pie', businessStructure);
            const companySizeChart = new ChartSSE('companySizeChart', 'pie', companySize);
            const businessActivityChart = new ChartSSE('businessActivityChart', 'bar', businessActivity); 
    </script>

    @endsection

</div>