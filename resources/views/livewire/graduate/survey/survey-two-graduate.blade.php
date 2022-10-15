<div>
    <x-slot name="title">
        Pertenencia y Disponibilidad
    </x-slot>

    <x-slot name="header">
        Pertinencia y disponibilidad de medio y recursos para el aprendizaje
    </x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="quality_teachers">Calidad de los docentes *</label>
                <div class="controls">
                    <select id="quality_teachers" wire:model.defer="state.quality_teachers"
                        class="form-control @error('quality_teachers') is-invalid @enderror"
                        title="Por favor seleccione la calidad de sus docentes">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('quality_teachers')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="syllabus">Plan de estudios *</label>
                <div class="controls">
                    <select id="syllabus" wire:model.defer="state.syllabus"
                        class="form-control @error('syllabus') is-invalid @enderror"
                        title="Por favor selecciona la calidad de plan de estudios">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('syllabus')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="study_condition">Satisfacción condiciones de estudio (infraestructura) *</label>
                <div class="controls">
                    <select id="study_condition" wire:model.defer="state.study_condition"
                        class="form-control @error('study_condition') is-invalid @enderror"
                        title="Por favor selecciona la calidad de condiciones de estudio">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('study_condition')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="experience">Experiencia obtenida a través de la residencia<br />profesional *</label>
                <div class="controls">
                    <select id="experience" wire:model.defer="state.experience"
                        class="form-control @error('experience') is-invalid @enderror"
                        title="Por favor selecciona como fue la experiencia en tu residencia">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('experience')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="study_emphasis">Énfasis que se le prestaba a la investigación dentro del proceso de
                    enseñanza *</label>
                <div class="controls">
                    <select id="study_emphasis" wire:model.defer="state.study_emphasis"
                        class="form-control @error('study_emphasis') is-invalid @enderror"
                        title="Por favor selecciona la calidad de énfasis que se le prestaba a la investigación">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('study_emphasis')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="participate_projects">Oportunidad de participar en proyectos de investigación y
                    desarrollo *</label>
                <div class="controls">
                    <select id="participate_projects" wire:model.defer="state.participate_projects"
                        class="form-control @error('participate_projects') is-invalid @enderror"
                        title="Por favor selecciona la calidad de poder participar en proyectos">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('participate_projects')
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