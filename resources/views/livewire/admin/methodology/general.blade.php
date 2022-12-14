<div>
    <x-slot name="title">
        Resultados Generales Cohorte
    </x-slot>

    <x-slot name="header">
        Reporte de resultados generales cohorte
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

                <div class="col-6" wire:ignore>
                    <div class="form-group">
                        <label for="careerSelected">Carrera</label>
                        <select id="careerSelected" class="select2-class form-control" title="Mencionar carrera"
                            multiple="multiple">
                            @foreach ($careers as $career)
                            <option @if(array_key_exists($career->id, $careerSelected))selected @endif
                                value="{{ $career->id }}">
                                {{ $career->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group text-center">
                        <label>Aplicar filtros</label>
                        <div class="controls">
                            <button type="button" class="btn bg-gradient-info w-100" wire:click.prevent="generateData">
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
                            <th class="align-middle" scope="col">PAR??METROS</th>
                            <th class="align-middle" scope="col">VALOR OBTENIDO</th>
                            <th class="align-middle" scope="col">VALIDACI??N</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Survey One --}}
                        {!! $this->drawTitle("I. PERFIL DEL EGRESADO", 1) !!}
                        <tr>
                            <td colspan="4">I.1 Datos personales y acad??micos del egresado</td>
                        </tr>

                        {{-- Survey Two --}}
                        {!! $this->drawTitle("II. PERTINENCIA Y DISPONIBILIDAD DE
                        MEDIOS Y RECURSOS PARA EL APRENDIZAJE",
                        2) !!}

                        {!! $this->drawColumn("II.1 Calidad de los docentes",
                        "Que al menos el 75% de los egresados califique como \"Muy Buena\" la calidad de los docentes.",
                        "quality_teachers", 75) !!}

                        {!! $this->drawColumn("II.2 Plan de Estudios",
                        "Que al menos el 75% de los egresados califique como \"Muy Buenos\" la cantidad y calidad de los
                        Planes de Estudio.",
                        "syllabus", 75) !!}

                        {!! $this->drawColumn("II.3 Oportunidad de participar en proyectos de investigaci??n y
                        desarrollo",
                        "Que al menos el 50% de los egresados califique como \"muy buenas\" las oportunidades.",
                        "participate_projects", 50) !!}

                        {!! $this->drawColumn("II.4 ??nfasis que se le prestaba a la investigaci??n dentro del proceso de
                        ense??anza-aprendizaje",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" la orientaci??n hacia la
                        investigaci??n.",
                        "study_emphasis", 50) !!}

                        {!! $this->drawColumn("II.5 ??Qu?? conocimientos del idioma ingl??s ten??a en el a??o en el que
                        egres???",
                        "Que al menos el 50% de los egresados califique como \"muy bueno\" el dominio de este idioma, en
                        un 60%.",
                        "percent_english", 50) !!}

                        {!! $this->drawColumn("II.6 Satisfacci??n con las condiciones de estudio (infraestructura)",
                        "Al menos que el 75% de los egresados califique como \"Muy Buena\" la infraestructura disponible
                        en la instituci??n.",
                        "study_condition", 75) !!}

                        {!! $this->drawColumn("II.7 Experiencia obtenida a trav??s de la Residencia Profesional",
                        "Al menos que el 90% de los egresados deben calificar como \"Muy Buena\" la experiencia obtenida
                        en la Residencia Profesional.",
                        "experience", 90) !!}


                        {{-- Survey Three --}}
                        {!! $this->drawTitle("III. UBICACI??N LABORAL DE LOS EGRESADOS",3) !!}

                        {!! $this->drawColumn("III.1 Tiempo transcurrido para obtener el primer empleo relacionado con
                        su carrera",
                        "Al menos el 60% de los egresados deben estar trabajando a un a??o de su egreso.",
                        "long_take_job", 60) !!}

                        {!! $this->drawColumn("III.2 Medio para obtener el empleo",
                        "Al menos el 10% de los egresados deben recibir apoyo de la bolsa del trabajo del Instituto.",
                        "hear_about", 10) !!}

                        {!! $this->drawColumn("III.3 Trabajo actual",
                        "Al menos el 60% de los egresados deben estar trabajando.",
                        "working", 60) !!}

                        {!! $this->drawColumn("III.4 Antig??edad en el empleo") !!}
                        {!! $this->drawColumn("III.5 Ingreso (salario m??nimo diario)") !!}

                        {!! $this->drawColumn("III.6 Nivel jer??rquico en el trabajo",
                        "Al menos el 70% de los egresados deben ocupar puestos de mando intermedio y superior.",
                        "management_level", 70) !!}

                        {!! $this->drawColumn("III.7 Requisitos de contrataci??n") !!}
                        {!! $this->drawColumn("III.8 Datos de la empresa u organismo") !!}
                        {!! $this->drawColumn("III.9 Sector econ??mico de la organizaci??n") !!}
                        {!! $this->drawColumn("III.10 Giro o actividad principal de la empresa u organizaci??n") !!}
                        {!! $this->drawColumn("III.11 Tama??o de la empresa u organizaci??n") !!}

                        {{-- Survey Four --}}
                        {!! $this->drawTitle("IV. DESEMPE??O PROFESIONAL (Coherencia
                        entre la formaci??n y el tipo de empleo)", 4) !!}

                        {!! $this->drawColumn("IV.1 Eficiencia para realizar las actividades laborales, en relaci??n con
                        su formaci??n
                        acad??mica",
                        "Al menos, el 70% de los egresados deben reportar que su formaci??n acad??mica les permite
                        desempe??arse
                        eficientemente.",
                        "efficiency_work_activities", 70) !!}

                        {!! $this->drawColumn("IV.2 Relaci??n del trabajo con su ??rea de formaci??n acad??mica",
                        "Al menos, el 90% de los egresados deben reportar que utilizan los conocimientos y habilidades
                        que se
                        adquirieron durante los estudios.",
                        "job_relationship", 90) !!}

                        {!! $this->drawColumn("IV.3 Aspectos de valoraci??n para obtener el empleo",
                        "Como m??ximo, un 10% de los egresados debe reportar carencias en cada uno de los aspectos que se
                        les
                        presentaron.",
                        "valorization", 10, 1) !!}

                        {!! $this->drawColumn("IV.4 Utilidad de las residencias profesionales o pr??cticas profesionales
                        para el
                        desarrollo laboral y profesional",
                        "Al menos el 30% de los egresados debe reportar la utilidad de las residencias profesionales
                        para la obtenci??n
                        de empleo, como muy buenas.",
                        "usefulness_professional_residence", 30) !!}

                        {!! $this->drawColumn("IV.5 Deficiencias en su formaci??n profesional para realizar las
                        actividades laborales",
                        "Como m??ximo el 10% de los egresados debe reportar deficiencias en su formaci??n.",
                        "academic_training", 10, 1) !!}

                        {{-- Survey Five --}}
                        {!! $this->drawTitle("V. EXPECTATIVAS DE DESARROLLO,
                        SUPERACI??N PROFESIONAL Y DE ACTUALIZACI??N", 5) !!}

                        {!! $this->drawColumn("V.1 Titulaci??n",
                        "Al menos el 50% de los egresados deben estar titulados en el primer a??o de egreso.",
                        "qualified", 50) !!}

                        {!! $this->drawColumn("V.2 Estudios actuales de posgrado",
                        "Al menos el 5% de los egresados debe continuar estudios de posgrado.",
                        "do_for_living", 5) !!}

                        {!! $this->drawColumn("V.3 Requerimiento de estudios de capacitaci??n y/o actualizaci??n") !!}

                    </tbody>
                </table>
            </div>
        </div>
        @section('scripts')
        <script type="text/javascript">
            $(document.body).on("select2:selecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('addCareer', career)
            });
                    
            $(document.body).on("select2:unselecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('removeCareer', career)
            });
        </script>

        @endsection
    </div>
</div>