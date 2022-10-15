<div>
    <x-slot name="title">
        Resultados Generales Contestación
    </x-slot>

    <x-slot name="header">
        Reporte de resultados generales contestación
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row d-flex justify-content-center">
                <a target="_blank" href="{{ route('pdf') }}" class="btn bg-gradient-success mb-4">
                    Imprimir reporte
                </a>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="col-2">
                    <div class="form-group">
                        <label for="dataFilterStart">Fecha de Inicio</label>
                        <div class="controls">
                            <input type="date" class="form-control" wire:model="dataFilterStart" id="dataFilterStart">
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="dataFilterEnd">Fecha Fin</label>
                        <div class="controls">
                            <input type="date" class="form-control" wire:model="dataFilterEnd" id="dataFilterEnd">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Carrera</label>
                        <div class="controls">
                            <select wire:model.defer="career" class="form-control"
                                oninvalid="this.setCustomValidity('Por favor seleccione una opción correcta')"
                                oninput="setCustomValidity('')">
                                <option value='TODAS' selected>TODAS</option>
                                @foreach ($careers as $career)
                                <option value="{{ $career }}">{{ $career }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group text-center">
                        <label>Aplicar filtros</label>
                        <div class="controls">
                            <button type="button" class="btn bg-gradient-info w-100" wire:click="filter">
                                Generar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl sm:rounded-lg">
                <table class="table table-responsive table-bordered w-100">
                    <thead>
                        <tr class="bg-tec text-white text-center w-25">
                            <th class="align-middle" scope="col">VARIABLES E INDICADORES</th>
                            <th class="align-middle" scope="col">PARÁMETROS</th>
                            <th class="align-middle" scope="col">VALOR OBTENIDO</th>
                            <th class="align-middle" scope="col">VALIDACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Survey One --}}
                        {!! $this->drawTitle("I. PERFIL DEL EGRESADO") !!}
                        <tr>
                            <td colspan="4">I.1 Datos personales y académicos del egresado</td>
                        </tr>

                        {{-- Survey Two --}}
                        {!! $this->drawTitle("II. PERTINENCIA Y DISPONIBILIDAD DE
                        MEDIOS Y RECURSOS PARA EL APRENDIZAJE") !!}

                        {!! $this->drawColumn("II.1 Calidad de los docentes",
                        "Que al menos el 75% de los egresados califique como \"Muy Buena\" la calidad de los docentes.",
                        "quality_teachers", 75) !!}

                        {!! $this->drawColumn("II.2 Plan de Estudios",
                        "Que al menos el 75% de los egresados califique como \"Muy Buenos\" la cantidad y calidad de los
                        Planes de Estudio.",
                        "syllabus", 75) !!}

                        {!! $this->drawColumn("II.3 Oportunidad de participar en proyectos de investigación y
                        desarrollo",
                        "Que al menos el 50% de los egresados califique como \"muy buenas\" las oportunidades.",
                        "participate_projects", 50) !!}

                        {!! $this->drawColumn("II.4 Énfasis que se le prestaba a la investigación dentro del proceso de
                        enseñanza-aprendizaje",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" la orientación hacia la
                        investigación.",
                        "study_emphasis", 50) !!}

                        {!! $this->drawColumn("II.5 ¿Qué conocimientos del idioma inglés tenía en el año en el que
                        egresó?",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" el dominio de este idioma, en
                        un 60%.",
                        "percent_english", 50) !!}

                        {!! $this->drawColumn("II.6 Satisfacción con las condiciones de estudio (infraestructura)",
                        "Al menos que el 75% de los egresados califique como \"Muy Buena\" la infraestructura disponible
                        en la institución.",
                        "study_condition", 75) !!}

                        {!! $this->drawColumn("II.7 Experiencia obtenida a través de la Residencia Profesional",
                        "Al menos que el 90% de los egresados deben calificar como \"Muy Buena\" la experiencia obtenida
                        en la Residencia Profesional.",
                        "experience", 90) !!}


                        {{-- Survey Three --}}
                        {!! $this->drawTitle("III. UBICACIÓN LABORAL DE LOS EGRESADOS") !!}

                        {!! $this->drawColumn("III.1 Tiempo transcurrido para obtener el primer empleo relacionado con
                        su carrera",
                        "Al menos el 60% de los egresados deben estar trabajando a un año de su egreso.",
                        "long_take_job", 60) !!}

                        {!! $this->drawColumn("III.2 Medio para obtener el empleo",
                        "Al menos el 10% de los egresados deben recibir apoyo de la bolsa del trabajo del Instituto.",
                        "hear_about", 10) !!}

                        {!! $this->drawColumn("III.3 Trabajo actual",
                        "Al menos el 60% de los egresados deben estar trabajando.",
                        "working", 60) !!}

                        {!! $this->drawColumn("III.4 Antigüedad en el empleo") !!}
                        {!! $this->drawColumn("III.5 Ingreso (salario mínimo diario)") !!}

                        {!! $this->drawColumn("III.6 Nivel jerárquico en el trabajo",
                        "Al menos el 70% de los egresados deben ocupar puestos de mando intermedio y superior.",
                        "management_level", 70) !!}

                        {!! $this->drawColumn("III.7 Requisitos de contratación") !!}
                        {!! $this->drawColumn("III.8 Datos de la empresa u organismo") !!}
                        {!! $this->drawColumn("III.9 Sector económico de la organización") !!}
                        {!! $this->drawColumn("III.10 Giro o actividad principal de la empresa u organización") !!}
                        {!! $this->drawColumn("III.11 Tamaño de la empresa u organización") !!}

                        {{-- Survey Four --}}
                        {!! $this->drawTitle("IV. DESEMPEÑO PROFESIONAL (Coherencia
                        entre la formación y el tipo de empleo)") !!}

                        {!! $this->drawColumn("IV.1 Eficiencia para realizar las actividades laborales, en relación con
                        su formación
                        académica",
                        "Al menos, el 70% de los egresados deben reportar que su formación académica les permite
                        desempeñarse
                        eficientemente.",
                        "efficiency_work_activities", 70) !!}

                        {!! $this->drawColumn("IV.2 Relación del trabajo con su área de formación académica",
                        "Al menos, el 90% de los egresados deben reportar que utilizan los conocimientos y habilidades
                        que se
                        adquirieron durante los estudios.",
                        "job_relationship", 90) !!}

                        {!! $this->drawColumn("IV.3 Aspectos de valoración para obtener el empleo",
                        "Como máximo, un 10% de los egresados debe reportar carencias en cada uno de los aspectos que se
                        les
                        presentaron.",
                        "valorization", 10, 1) !!}

                        {!! $this->drawColumn("IV.4 Utilidad de las residencias profesionales o prácticas profesionales
                        para el
                        desarrollo laboral y profesional",
                        "Al menos el 30% de los egresados debe reportar la utilidad de las residencias profesionales
                        para la obtención
                        de empleo, como muy buenas.",
                        "usefulness_professional_residence", 30) !!}

                        {!! $this->drawColumn("IV.5 Deficiencias en su formación profesional para realizar las
                        actividades laborales",
                        "Como máximo el 10% de los egresados debe reportar deficiencias en su formación.",
                        "academic_training", 10, 1) !!}

                        {{-- Survey Five --}}
                        {!! $this->drawTitle("V. EXPECTATIVAS DE DESARROLLO,
                        SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN") !!}

                        {!! $this->drawColumn("V.1 Titulación",
                        "Al menos el 50% de los egresados deben estar titulados en el primer año de egreso.",
                        "qualified", 50) !!}

                        {!! $this->drawColumn("V.2 Estudios actuales de posgrado",
                        "Al menos el 5% de los egresados debe continuar estudios de posgrado.",
                        "do_for_living", 5) !!}

                        {!! $this->drawColumn("V.3 Requerimiento de estudios de capacitación y/o actualización") !!}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>