<div>
    <x-header title="Pertenencia y Disponibilidad"
            header="Pertinencia y disponibilidad de medio y recursos para el aprendizaje" />

    <div class="row">
        <x-select-component idInput='quality_teachers' title="Calidad de los docentes" :options="$goodBadQuestions"  lg="4" md="6" sm="12"/>
        <x-select-component idInput='syllabus' title="Plan de estudios" :options="$goodBadQuestions" lg="4" md="6" sm="12" />
        <x-select-component idInput='study_condition' title="Satisfacción condiciones de estudio (infraestructura)" :options="$goodBadQuestions" lg="4" md="6" sm="12" />
        <x-select-component idInput='experience' title="Experiencia obtenida a través de la residencia profesional" :options="$goodBadQuestions" lg="4" md="6" sm="12" />
        <x-select-component idInput='study_emphasis' title="Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza" :options="$goodBadQuestions" lg="4" md="6" sm="12" />
        <x-select-component idInput='participate_projects' title="Oportunidad de participar en proyectos de investigación y desarrollo" :options="$goodBadQuestions" lg="4" md="6" sm="12" />
    </div>

    <x-save-component route='graduate.dashboard' />
</div>