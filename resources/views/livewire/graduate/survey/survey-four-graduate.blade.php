<div>
    <x-header title="Desempeño profesional de los egresados" />    

    <div class="row">
        <x-select-component idInput='efficiency_work_activities' title="Eficiencia para realizar las actividades laborales, en relación con su formación académica" :options="$levelActivities" md="12" sm="12" />
        <x-select-component idInput='academic_training' title="Cómo califica su formación académica con respecto a su desempeño laboral" :options="$levelActivitiesTwo" md="12" sm="12" />
        <x-select-component idInput='usefulness_professional_residence' title="Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional" :options="$levelActivitiesTwo" md="12" sm="12" />
    </div>

    <hr>

    <div class="row mb-3 mt-4 ml-1 d-flex justify-content-sm-center">
        <div class="col-12">
            <h5 class="text-bold text-center">
                Aspectos que valora la empresa u organismo para la contratación de egresados. <br />
                Llena el formulario donde 1 es poco y 5 es mucho.
            </h5>
        </div>
    </div>
    <hr>
    <div class="row">
        <x-select-component idInput='study_area' title="Área o Campo de Estudio" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='title' title="Titulación" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='experience' title="Experiencia Laboral / Práctica (antes de egresar)" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='job_competence' title="Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en equipo" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='positioning' title="Posicionamiento de la Institución de Egreso" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='languages' title="Conocimiento de Idiomas Extranjeros" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='recommendations' title="Recomendaciones / Referencias" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='personality' title="Personalidad / Actitudes" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='leadership' title="Capacidad de Liderazgo" :options="$numbers" lg="6" md="12" sm="12" />
        <x-select-component idInput='others' title="Otros Aspectos" :options="$numbers" lg="6" md="12" sm="12" />
    </div>

    <x-save-component route='graduate.dashboard' />
</div>