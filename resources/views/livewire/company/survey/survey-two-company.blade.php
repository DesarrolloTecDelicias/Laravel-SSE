<div>
    <x-slot name="title">
        Ubicación laboral
    </x-slot>

    <x-slot name="header">
        Ubicación laboral de los egresados
    </x-slot>

    <div>
        <label>Número de profesionistas con nivel de licenciatura que laboran en la empresa u organismo. *</label>
        <div class="row mt-2 d-flex justify-content-sm-center">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="controls">
                        <select id="number_graduates" wire:model.defer="state.number_graduates" name="number_graduates"
                            required class="form-control @error('number_graduates') is-invalid @enderror"
                            title="Por favor seleccione el número de profesionistas">
                            <option value="" selected="" disabled="">Selecciona una opción</option>
                            @foreach ($numberGraduates as $graduates)
                            <option value="{{ $graduates }}">{{ $graduates }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('number_graduates')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <hr>

        <label class="mb-4">Número de egresados del Instituto Tecnológico y nivel jerárquico que ocupan en su
            organización.</label>
        <div class=" add-input">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Carreras</label>
                        <div class="controls">
                            <select wire:model="careersArray.0" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione la carrera
                                </option>
                                @foreach ($careers as $career)
                                <option value="{{ $career->name }}">{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Nivel jerárquico</label>
                        <div class="controls">
                            <select wire:model="levelsArray.0" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione el nivel jerárquico
                                </option>
                                @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <div class="controls">
                            <input type="text" wire:model="totalsArray.0" class="form-control" placeholder="Cantidad">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="form-group">
                        <label></label>
                        <div class="controls">
                            <button class="btn btn-success mt-2" wire:click.prevent="add({{$i}})"><i
                                    class="fa fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($inputs as $key => $value)
        <div class=" add-input">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group">
                        <label>Carreras</label>
                        <div class="controls">
                            <select wire:model="careersArray.{{ $value }}" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione la carrera
                                </option>
                                @foreach ($careers as $career)
                                <option value="{{ $career->name }}">{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group">
                        <label>Nivel jerárquico</label>
                        <div class="controls">
                            <select wire:model="levelsArray.{{ $value }}" class="form-control">
                                <option value="" selected="" disabled="">
                                    Seleccione el nivel jerárquico
                                </option>
                                @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <div class="controls">
                            <input type="text" wire:model="totalsArray.{{ $value }}" class="form-control"
                                placeholder="Cantidad">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="form-group">
                        <label></label>
                        <div class="controls">
                            <button class="btn btn-danger mt-2" wire:click.prevent="remove({{$key}})"><i
                                    class="fa fa-minus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <label>Congruencia entre perfil profesional y función que desarrollan los egresados del Instituto Tecnológico en
            su empresa u organización. Del total de egresados anote el porcentaje que corresponda. *</label>
        <div class="row mt-2 d-flex justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="controls">
                        <select id="congruence" name="congruence" wire:model.defer="state.congruence" required
                            class="form-control @error('congruence') is-invalid @enderror"
                            title="Por favor seleccione la congruencia entre el perfil y la función">
                            <option value="" selected="" disabled="">Selecciona una opción</option>
                            @foreach ($congruences as $congruence)
                            <option value="{{ $congruence }}">{{ $congruence }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('congruence')
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
                <label>Requisito que establece para la contratación de personal a nivel licenciatura.</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" id="competence1" name="competence1"
                        wire:model.defer="state.competence1" type="checkbox" title="Competencia #1">
                    <label class="form-check-label">Área o campo de estudio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence2" name="competence2"
                        wire:model.defer="state.competence2" type="checkbox" title="Competencia #2">
                    <label class="form-check-label">Títulación</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence3" name="competence3"
                        wire:model.defer="state.competence3" type="checkbox" title="Competencia #3">
                    <label class="form-check-label">Experiencia Laboral/Práctica (Antes de egresar)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence4" name="competence4"
                        wire:model.defer="state.competence4" type="checkbox" title="Competencia #4">
                    <label class="form-check-label">Posicionamiento de la institución de egreso</label>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" id="competence5" name="competence5"
                        wire:model.defer="state.competence5" type="checkbox" title="Competencia #5">
                    <label class="form-check-label">Conocimiento de idiomas extranjeros</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence6" name="competence6"
                        wire:model.defer="state.competence6" type="checkbox" title="Competencia #6">
                    <label class="form-check-label">Recomendaciones / Referencias</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence7" name="competence7"
                        wire:model.defer="state.competence7" type="checkbox" title="Competencia #7">
                    <label class="form-check-label">Personalidad / Actitudes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="competence8" name="competence8"
                        wire:model.defer="state.competence8" type="checkbox" title="Competencia #8">
                    <label class="form-check-label">Capacidad de liderazgo</label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Carrera que demanda preferentemente su empresa u organismo. *</label>
                    <div class="controls">
                        <select id="career_id" name="career_id"
                            wire:model.defer="state.career_id" required
                            class="form-control @error('career_id') is-invalid @enderror">
                            <option value="" selected="" disabled="">
                                Seleccione la carrera
                            </option>
                            @foreach ($careers as $career)
                            <option value="{{ $career->id }}">{{ $career->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('career_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
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