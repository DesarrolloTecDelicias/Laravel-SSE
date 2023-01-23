<div>
    <x-header title="Estadísticas Competencias Laborales" />

    <div>
        <div class="row">
            <x-chart-component idChart="averagesArrayChart" description="Competencias considera deben desarrollar los egresados del Instituto Tecnológico, para desempeñarse eficientemente en sus actividades laborales. Promedios."
                title="competencias_laborales_promedios" />

            <x-chart-component idChart="resolveConflictsChart" description="Habilidad para resolver conflictos"
                title="resolver_conflictos" lg="6" md="6" />

            <x-chart-component idChart="orthographyChart" description="Ortografía y redacción de documentos"
                title="ortografia_redaccion" lg="6" md="6" />

            <x-chart-component idChart="processImprovementChart" description="Mejora de procesos"
                title="mejora_procesos" lg="6" md="6" />

            <x-chart-component idChart="teamworkChart" description="Trabajo en equipo"
                title="trabajo_equipo" lg="6" md="6" />

            <x-chart-component idChart="timeManagementChart" description="Habilidad para administrar tiempo"
                title="administracion_tiempo" lg="6" md="6" />

            <x-chart-component idChart="securityChart" description="Seguridad personal"
                title="seguridad_personal" lg="6" md="6" />
                
            <x-chart-component idChart="easeSpeechChart" description="Facilidad de palabra"
                title="facilidad_palabra" lg="6" md="6" />

            <x-chart-component idChart="projectManagementChart" description="Gestión de proyectos"
                title="gestion_proyectos" lg="6" md="6" />

            <x-chart-component idChart="puntualityChart" description="Puntualidad y asistencia"
                title="puntualidad_asistencia" lg="6" md="6" />

            <x-chart-component idChart="rulesChart" description="Cumplimiento de las normas"
                title="puntualidad_asistencia" lg="6" md="6" />

            <x-chart-component idChart="integrationWorkChart" description="Integración al trabajo"
                title="integracion_trabajo" lg="6" md="6" />                

            <x-chart-component idChart="creativityChart" description="Creatividad e innovación"
                title="creatividad_innovacion" lg="6" md="6" />                

            <x-chart-component idChart="bargainingChart" description="Capacidad de negociación"
                title="capacidad_negociacion" lg="6" md="6" />

            <x-chart-component idChart="abstractionChart" description="Abstracción, análisis y síntesis"
                title="abstraccion_analisis_sintesis" lg="6" md="6" />

            <x-chart-component idChart="leadershipChart" description="Liderazgo y toma de decisión"
                title="liderazgo_toma_decisiones" lg="6" md="6" />                

            <x-chart-component idChart="changesChart" description="Adaptar al cambio"
                title="adaptacion_cambios" lg="6" md="6" />

            <x-chart-component idChart="jobPerformanceChart" description="¿Cómo considera su desempeño laboral respecto a su formación académica? Del total de egresados anote el porcentaje que corresponda."
                title="desempeno_laboral_formacion_academica" />
        </div>
    </div>

    @section('scripts')
    <script type="module">
        import ChartSSE from '/js/chartOld.js';      
            const chartsData = @php echo $json; @endphp;
            const { 
                averagesArray,
                resolveConflicts,
                orthography,
                processImprovement,
                teamwork,
                timeManagement,
                security,
                easeSpeech,
                projectManagement,
                puntuality,
                rules,
                integrationWork,
                creativity,
                bargaining,
                abstraction,
                leadership,
                changes,
                jobPerformance
            } = chartsData;
    
            const averagesArrayChart = new ChartSSE('averagesArrayChart', 'bar', averagesArray);
            const resolveConflictsChart = new ChartSSE('resolveConflictsChart', 'pie', resolveConflicts);
            const orthographyChart = new ChartSSE('orthographyChart', 'pie', orthography);
            const processImprovementChart = new ChartSSE('processImprovementChart', 'pie', processImprovement);
            const teamworkChart = new ChartSSE('teamworkChart', 'pie', teamwork);
            const timeManagementChart = new ChartSSE('timeManagementChart', 'pie', timeManagement);
            const securityChart = new ChartSSE('securityChart', 'pie', security);
            const easeSpeechChart = new ChartSSE('easeSpeechChart', 'pie', easeSpeech);
            const projectManagementChart = new ChartSSE('projectManagementChart', 'pie', projectManagement);
            const puntualityChart = new ChartSSE('puntualityChart', 'pie', puntuality);
            const rulesChart = new ChartSSE('rulesChart', 'pie', rules);
            const integrationWorkChart = new ChartSSE('integrationWorkChart', 'pie', integrationWork);
            const creativityChart = new ChartSSE('creativityChart', 'pie', creativity);
            const bargainingChart = new ChartSSE('bargainingChart', 'pie', bargaining);
            const abstractionChart = new ChartSSE('abstractionChart', 'pie', abstraction);
            const leadershipChart = new ChartSSE('leadershipChart', 'pie', leadership);
            const changesChart = new ChartSSE('changesChart', 'pie', changes);
            const jobPerformanceChart = new ChartSSE('jobPerformanceChart', 'pie', jobPerformance);
        
    </script>

    @endsection

</div>