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
                <a target="_blank" href="{{ route('datepdf') }}" class="btn bg-gradient-success mb-4">
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
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">I. PERFIL DEL EGRESADO</td>
                        </tr>
                        <tr>
                            <td colspan="4">I.1 Datos personales y académicos del egresado</td>
                        </tr>

                        {{-- Survey Two --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">II. PERTINENCIA Y DISPONIBILIDAD DE
                                MEDIOS Y RECURSOS PARA EL APRENDIZAJE</td>
                        </tr>
                        <tr>
                            <td>II.1 Calidad de los docentes</td>
                            <td class="text-justify">Que al menos el 75% de los egresados califique como "Muy Buena" la
                                calidad de los docentes.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['quality_teachers']) }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['quality_teachers'], 75) !!}">
                                <span contenteditable>{{$state['quality_teachers'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.2 Plan de Estudios</td>
                            <td class="text-justify">Que al menos el 75% de los egresados califique como "Muy Buenos" la
                                cantidad y calidad de los Planes de Estudio.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['syllabus']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['syllabus'], 75) !!}">
                                <span contenteditable>{{$state['syllabus'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.3 Oportunidad de participar en proyectos de investigación y desarrollo</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy buenas"
                                las oportunidades.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['participate_projects'])
                                    }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['participate_projects'], 50) !!}">
                                <span contenteditable>{{$state['participate_projects'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.4 Énfasis que se le prestaba a la investigación dentro del proceso de
                                enseñanza-aprendizaje</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy bueno" la
                                orientación hacia la investigación.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['study_emphasis']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['study_emphasis'], 50) !!}">
                                <span contenteditable>{{$state['study_emphasis'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.5 ¿Qué conocimientos del idioma inglés tenía en el año en el que egresó?</td>
                            <td class="text-justify">Que al menos el 50% de los egresados califique como "muy bueno" el
                                dominio de este idioma, en un 60%.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['percent_english']) }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['percent_english'], 50) !!}">
                                <span contenteditable>{{$state['percent_english'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.6 Satisfacción con las condiciones de estudio (infraestructura)</td>
                            <td class="text-justify">Al menos que el 75% de los egresados califique como "Muy Buena" la
                                infraestructura disponible en la institución.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['study_condition']) }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['study_condition'], 75) !!}">
                                <span contenteditable>{{$state['study_condition'] - 75 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>II.7 Experiencia obtenida a través de la Residencia Profesional</td>
                            <td class="text-justify">Al menos que el 90% de los egresados deben calificar como "Muy
                                Buena" la experiencia obtenida en la Residencia Profesional.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['experience']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['experience'], 90) !!}">
                                <span contenteditable>{{$state['experience'] - 90 }}</span>
                            </td>
                        </tr>

                        {{-- Survey Three --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">III. UBICACIÓN LABORAL DE LOS EGRESADOS
                            </td>
                        </tr>
                        <tr>
                            <td>III.1 Tiempo transcurrido para obtener el primer empleo relacionado con su carrera</td>
                            <td class="text-justify">Al menos el 60% de los egresados deben estar trabajando a un año de
                                su egreso.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['long_take_job']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['long_take_job'], 60) !!}">
                                <span contenteditable>{{$state['long_take_job'] - 60 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.2 Medio para obtener el empleo</td>
                            <td class="text-justify">Al menos el 10% de los egresados deben recibir apoyo de la bolsa
                                del trabajo del Instituto.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['hear_about']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['hear_about'], 10) !!}">
                                <span contenteditable>{{$state['hear_about'] - 10 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.3 Trabajo actual</td>
                            <td class="text-justify">Al menos el 60% de los egresados deben estar trabajando.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['working']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['working'], 60) !!}">
                                <span contenteditable>{{$state['working'] - 60 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>III.4 Antigüedad en el empleo</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.5 Ingreso (salario mínimo diario)</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.6 Nivel jerárquico en el trabajo</td>
                            <td class="text-justify">Al menos el 70% de los egresados deben ocupar puestos de mando
                                intermedio y superior.</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>III.7 Requisitos de contratación</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.8 Datos de la empresa u organismo</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.9 Sector económico de la organización</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.10 Giro o actividad principal de la empresa u organización</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>
                        <tr>
                            <td>III.11 Tamaño de la empresa u organización</td>
                            <td class="align-middle text-center">Micro, pequeña, mediana o gran empresa.</td>
                            <td class="align-middle text-center">S/D.</td>
                            <td class="align-middle text-center">S/D.</td>
                        </tr>

                        {{-- Survey Four --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">IV. DESEMPEÑO PROFESIONAL (Coherencia
                                entre la formación y el tipo de empleo)</td>
                        </tr>
                        <tr>
                            <td>IV.1 Eficiencia para realizar las actividades laborales, en relación con su formación
                                académica</td>
                            <td class="text-justify">Al menos, el 70% de los egresados deben reportar que su formación
                                académica les permite desempeñarse eficientemente.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['efficiency_work_activities'])
                                    }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['efficiency_work_activities'], 70) !!}">
                                <span contenteditable>{{$state['efficiency_work_activities'] - 70 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.2 Relación del trabajo con su área de formación académica</td>
                            <td class="text-justify">Al menos, el 90% de los egresados deben reportar que utilizan los
                                conocimientos y habilidades que se adquirieron durante los estudios.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['job_relationship']) }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['job_relationship'], 90) !!}">
                                <span contenteditable>{{$state['job_relationship'] - 90 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.3 Aspectos de valoración para obtener el empleo</td>
                            <td class="text-justify">Como máximo, un 10% de los egresados debe reportar carencias en
                                cada uno de los aspectos que se les presentaron.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['valorization']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass(10, $state['valorization']) !!}">
                                <span contenteditable>{{10-$state['valorization'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.4 Utilidad de las residencias profesionales o prácticas profesionales para el
                                desarrollo laboral y profesional</td>
                            <td class="text-justify">Al menos el 30% de los egresados debe reportar la utilidad de las
                                residencias profesionales para la obtención de empleo, como muy buenas.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{
                                    $this->returnPercentText($state['usefulness_professional_residence'])
                                    }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass($state['usefulness_professional_residence'], 30) !!}">
                                <span contenteditable>{{$state['usefulness_professional_residence'] - 30 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>IV.5 Deficiencias en su formación profesional para realizar las actividades laborales
                            </td>
                            <td class="text-justify">Como máximo el 10% de los egresados debe reportar deficiencias en
                                su formación.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['academic_training']) }}</span>
                            </td>
                            <td
                                class="align-middle text-center {!! $this->textClass(10, $state['academic_training']) !!}">
                                <span contenteditable>{{10-$state['academic_training'] }}</span>
                            </td>
                        </tr>

                        {{-- Survey Five --}}
                        <tr>
                            <td colspan="4" class="bg-tec text-white text-bold">V. EXPECTATIVAS DE DESARROLLO,
                                SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN</td>
                        </tr>
                        <tr>
                            <td>V.1 Titulación</td>
                            <td class="text-justify">Al menos el 50% de los egresados deben estar titulados en el primer
                                año de egreso.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['qualified']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['qualified'], 50) !!}">
                                <span contenteditable>{{$state['qualified'] - 50 }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>V.2 Estudios actuales de posgrado</td>
                            <td class="text-justify">Al menos el 5% de los egresados debe continuar estudios de
                                posgrado.</td>
                            <td class="align-middle text-center">
                                <span contenteditable>{{ $this->returnPercentText($state['do_for_living']) }}</span>
                            </td>
                            <td class="align-middle text-center {!! $this->textClass($state['do_for_living'], 5) !!}">
                                <span contenteditable>{{$state['do_for_living'] - 5 }}</span>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-left">V.3 Requerimiento de estudios de capacitación y/o actualización</td>
                            <td class="align-middle">S/D.</td>
                            <td class="align-middle">S/D.</td>
                            <td class="align-middle">S/D.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>