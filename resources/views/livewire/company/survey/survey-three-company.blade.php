<div>
    <x-header title="Competencias Laborales" />

    <label>En su opinión ¿qué competencias considera deben desarrollar los egresados del Instituto Tecnológico, para
        desempeñarse eficientemente en sus actividades laborales? <br>
        Por favor evalúe conforme a la tabla siguiente: Califique del 1(menor) al 5(mayor):</label>
    <hr>

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="resolve_conflicts">Habilidad para resolver conflictos *</label>
                <div class="controls">
                    <select id="resolve_conflicts" wire:model.defer="state.resolve_conflicts"
                        class="form-control @error('resolve_conflicts') is-invalid @enderror"
                        title="Por favor califique la habilidad">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('resolve_conflicts')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="orthography">Ortografía y redacción de documentos *</label>
                <div class="controls">
                    <select id="orthography" wire:model.defer="state.orthography"
                        class="form-control @error('orthography') is-invalid @enderror"
                        title="Por favor califique la ortografía">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('orthography')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="process_improvement">Mejora de procesos *</label>
                <div class="controls">
                    <select id="process_improvement" wire:model.defer="state.process_improvement"
                        class="form-control @error('process_improvement') is-invalid @enderror"
                        title="Por favor califique los procesos">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('process_improvement')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="teamwork">Trabajo en equipo *</label>
                <div class="controls">
                    <select id="teamwork" wire:model.defer="state.teamwork"
                        class="form-control @error('teamwork') is-invalid @enderror"
                        title="Por favor califique el trabajo en equipo">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('teamwork')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="time_management">Habilidad para administrar tiempo *</label>
                <div class="controls">
                    <select id="time_management" wire:model.defer="state.time_management"
                        class="form-control @error('time_management') is-invalid @enderror"
                        title="Por favor califique la habilidad para administación">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('time_management')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="security">Seguridad personal *</label>
                <div class="controls">
                    <select id="security" wire:model.defer="state.security"
                        class="form-control @error('security') is-invalid @enderror"
                        title="Por favor califique la seguridad personal">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('security')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="ease_speech">Facilidad de palabra *</label>
                <div class="controls">
                    <select id="ease_speech" wire:model.defer="state.ease_speech"
                        class="form-control @error('ease_speech') is-invalid @enderror"
                        title="Por favor califique la facilidad de palabra">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('ease_speech')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="project_management">Gestión de proyectos *</label>
                <div class="controls">
                    <select id="project_management" wire:model.defer="state.project_management"
                        class="form-control @error('project_management') is-invalid @enderror"
                        title="Por favor califique la gestión de proyectos">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('project_management')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="puntuality">Puntualidad y asistencia *</label>
                <div class="controls">
                    <select id="puntuality" wire:model.defer="state.puntuality"
                        class="form-control @error('puntuality') is-invalid @enderror"
                        title="Por favor califique la puntualidad">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('puntuality')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="rules">Cumplimiento de las normas *</label>
                <div class="controls">
                    <select id="rules" wire:model.defer="state.rules"
                        class="form-control @error('rules') is-invalid @enderror"
                        title="Por favor califique el cumplimiento de normas">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('rules')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="integration_work">Integración al trabajo *</label>
                <div class="controls">
                    <select id="integration_work" wire:model.defer="state.integration_work"
                        class="form-control @error('integration_work') is-invalid @enderror"
                        title="Por favor califique la integración al trabajo">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('integration_work')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="creativity">Creatividad e innovación *</label>
                <div class="controls">
                    <select id="creativity" wire:model.defer="state.creativity"
                        class="form-control @error('creativity') is-invalid @enderror" title=" Por favor
                        califique la creatividad">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('creativity')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="bargaining">Capacidad de negociación *</label>
                <div class="controls">
                    <select id="bargaining" wire:model.defer="state.bargaining"
                        class="form-control @error('bargaining') is-invalid @enderror"
                        title="Por favor califique la capacidad de negociación">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('bargaining')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="abstraction">Abstracción, análisis y síntesis *</label>
                <div class="controls">
                    <select id="abstraction" wire:model.defer="state.abstraction"
                        class="form-control @error('abstraction') is-invalid @enderror"
                        title="Por favor califique la abstracción">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('abstraction')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="leadership">Liderazgo y toma de decisión *</label>
                <div class="controls">
                    <select id="leadership" wire:model.defer="state.leadership"
                        class="form-control @error('leadership') is-invalid @enderror"
                        title="Por favor califique el liderazgo">
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
                <label for="changes">Adaptar al cambio *</label>
                <div class="controls">
                    <select id="changes" wire:model.defer="state.changes"
                        class="form-control @error('changes') is-invalid @enderror"
                        title="Por favor califique el liderazgo">
                        <option value="" selected="" disabled="">Selecciona una calificación</option>
                        @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                @error('changes')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <hr>

    <label>Con base al desempeño laboral así como a las actividades laborales que realiza el egresado.
        ¿Cómo considera su desempeño laboral respecto a su formación académica? *</label>

    <div class="row mt-2 d-flex justify-content-sm-center">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <div class="controls">
                    <select id="job_performance" wire:model.defer="state.job_performance"
                        class="form-control @error('job_performance') is-invalid @enderror"
                        title="Por favor seleccione la calidad de sus docentes">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($goodBadQuestions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('job_performance')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="requirement">
                    De acuerdo con las necesidades de su empresa u organismo, ¿qué sugiere para
                    mejorar la formación de los egresados del Instituto Tecnológico? *
                </label>
                <textarea id="requirement" wire:model.defer="state.requirement"
                    class="form-control @error('requirement') is-invalid @enderror" rows="4"
                    placeholder="Escribe aquí sus sugerencias de mejora"></textarea>
                @error('requirement')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label>Comentarios y sugerencias</label>
                <textarea id="comments" wire:model.defer="state.comments" class="form-control" rows="4"
                    placeholder="Escribe aquí sus comentarios"></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-2 pb-2 d-flex align-items-center flex-column">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <button class="btn btn-block bg-gradient-primary" wire:click="save">Guardar Encuesta</button>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <a href="{{ route('company.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>