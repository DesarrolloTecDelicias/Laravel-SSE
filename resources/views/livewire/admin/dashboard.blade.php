<div>
    <x-header title="Tablero" header="Tablero de Administrador" />

    @if (Auth::user()->role =="support" )
    <div class="row flex justify-center align-items-center text-center my-5">
        <h2>Este usuario solamente tiene permisos para consumir el proyecto como servicio. 
            Para modificar estos permisos, contacte al administrador del sistema.
        </h2>
    </div>
    @else
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <x-box-component :value="$allUsers" title="Egresados registrados" icon='person' route='graduates.graduates'
            bg='info' />
        <x-box-component :value="$allCompanies" title="Empresas registradas" icon='briefcase' route='company.companies'
            bg='success' />
        <x-box-component :value="$surveyOneCount" title="Perfil del Egresado respondidas" icon='document'
            route='report.graduate.survey.one' bg='warning' />
        <x-box-component :value="$surveysPercentage . ' %'" title="% con 7 encuestas respondidas" icon='pie-graph'
            route='graduates.graduates.surveys' bg='danger' />
        <x-box-component :value="$newUsers" title="Usuarios Nuevos(Mes Actual)" icon='plus' route='graduates.graduates'
            bg='info' />
        <x-box-component :value="$relation . ' %'" title="Relación de Perfil del Egresado" icon='checkmark'
            route='report.graduate.survey.one' bg='success' />
        <x-box-component :value="$careerCount" :title="$career .'+ Egresados'" icon='ios-book'
            route='graduates.graduates' bg='warning' />
        <x-box-component :value="$notUsers" title="Usuarios sin registros" icon='sad'
            route='graduates.graduates.surveys' bg='danger' />
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <x-chart-component idChart="careerChart" description="Carrera de los egresados" title="carrera_egresados"
            lg="6" />
        <x-chart-component idChart="doForLiving" description="¿Qué es lo que están haciendo los egresados?"
            title="que_hacen_egresados" lg="6" />
        <x-chart-component idChart="qualityChart" description="Calidad de los docentes según los egresados"
            title="calidad_docentes" lg="6" />
        <x-chart-component idChart="sexChart" description="Sexo de los egresados" title="sexo_egresados" lg="6" />
    </div>
    <!-- /.row (main row) -->
    @endif

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chartOld.js';
        
        const chartsData = @php echo $json; @endphp;
        const { career, sex, quality, doForLiving } = chartsData;
        new ChartSSE('careerChart', 'doughnut', career);
        new ChartSSE('doForLiving', 'pie', doForLiving);
        new ChartSSE('qualityChart', 'pie', quality);
        new ChartSSE('sexChart', 'doughnut', sex);
    </script>

    @endsection
</div>