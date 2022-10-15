<div>
    <x-slot name="title">
        Desempeño Profesional
    </x-slot>

    <x-slot name="header">
        Desempeño profesional de los egresados
    </x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="efficiency_work_activities">
                    Eficiencia para realizar las actividades laborales, en relación con su formación académica *
                </label>
                <div class="controls">
                    <select id="efficiency_work_activities" wire:model.defer="state.efficiency_work_activities"
                        class="form-control @error('efficiency_work_activities') is-invalid @enderror"
                        title="Por favor selecciona la calidad para realizar las actividades laborales, en relación con su formación académica">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($levelActivities as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('efficiency_work_activities')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="academic_training">
                    Cómo califica su formación académica con respecto a su desempeño laboral *
                </label>
                <div class="controls">
                    <select id="academic_training" wire:model.defer="state.academic_training"
                        class="form-control @error('academic_training') is-invalid @enderror"
                        title="Por favor selecciona la calidad de formación académica con respecto a su desempeño">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($levelActivitiesTwo as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('academic_training')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="usefulness_professional_residence">
                    Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y
                    profesional *
                </label>
                <div class="controls">
                    <select id="usefulness_professional_residence"
                        wire:model.defer="state.usefulness_professional_residence"
                        title="Por favor selecciona la calidad de utilidad de residencia profesionale o práctica profesionale para su desarrollo laboral"
                        class="form-control @error('usefulness_professional_residence') is-invalid @enderror">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($levelActivitiesTwo as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('usefulness_professional_residence')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <hr>
    <div class="row mb-3 mt-4 ml-1 d-flex justify-content-sm-center">
        <div class="col-12">
            <h5 class="text-bold">
                Aspectos que valora la empresa u organismo para la contratación de egresados. Llena el formulario donde
                1 es poco y 5 es mucho.
            </h5>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="study_area">Área o Campo de Estudio *</label>
                <div class="controls">
                    <select id="study_area" wire:model.defer="state.study_area"
                        class="form-control @error('study_area') is-invalid @enderror"
                        title="Por favor califique el área de estudio">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('study_area')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="title">Titulación *</label>
                <div class="controls">
                    <select id="title" wire:model.defer="state.title"
                        class="form-control @error('title') is-invalid @enderror"
                        title="Por favor califique la titulación">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="experience">Experiencia Laboral / Práctica (antes de egresar) *</label>
                <div class="controls">
                    <select id="experience" wire:model.defer="state.experience"
                        class="form-control @error('experience') is-invalid @enderror"
                        title="Por favor califique la experiencia laboral">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('experience')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="job_competence">Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en
                    equipo *</label>
                <div class="controls">
                    <select id="job_competence" wire:model.defer="state.job_competence"
                        class="form-control @error('job_competence') is-invalid @enderror"
                        title="Por favor califique la competencia laboral">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('job_competence')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="positioning">Posicionamiento de la Institución de Egreso *</label>
                <div class="controls">
                    <select id="positioning" wire:model.defer="state.positioning"
                        class="form-control @error('positioning') is-invalid @enderror"
                        title="Por favor califique el posicionamiento de la institución de egreso">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('positioning')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="languages">Conocimiento de Idiomas Extranjeros *</label>
                <div class="controls">
                    <select id="languages" wire:model.defer="state.languages"
                        class="form-control @error('languages') is-invalid @enderror"
                        title="Por favor califique el conocimiento de idiomas extranjeros">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('languages')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="recommendations">Recomendaciones / Referencias *</label>
                <div class="controls">
                    <select id="recommendations" wire:model.defer="state.recommendations"
                        class="form-control @error('recommendations') is-invalid @enderror"
                        title="Por favor califique las recomendaciones">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('recommendations')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="personality">Personalidad / Actitudes *</label>
                <div class="controls">
                    <select id="personality" wire:model.defer="state.personality"
                        class="form-control @error('personality') is-invalid @enderror"
                        title="Por favor califique la personalidad">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('personality')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="leadership">Capacidad de liderazgo *</label>
                <div class="controls">
                    <select id="leadership" wire:model.defer="state.leadership"
                        class="form-control @error('leadership') is-invalid @enderror"
                        title="Por favor califique la capacidad de liderazgo">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('leadership')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="others">Otros Aspectos *</label>
                <div class="controls">
                    <select id="others" wire:model.defer="state.others"
                        class="form-control @error('others') is-invalid @enderror"
                        title="Por favor califique otros aspectos">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('others')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2 pb-2 d-flex align-items-center flex-column">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <button class="btn btn-block bg-gradient-primary" wire:click="save">Guardar Encuesta</button>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <a href="{{ route('graduate.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>