<div>
    <x-slot name="title">
        Ubicación Laboral
    </x-slot>

    <x-slot name="header">
        Ubicación laboral de los egresados
    </x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="do_for_living">Actividad a la que se dedica actualmente *</label>
                <div class="controls">
                    <select id="do_for_living" wire:model.defer="state.do_for_living"
                        class="form-control @error('do_for_living') is-invalid @enderror"
                        title="Por favor seleccione una actividad" wire:change="changeActivity">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($doForLiving as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('do_for_living')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    @if ($schoolVisibility)
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-5 col-sm-12">
            <div class="form-group">
                <label for="speciality">Indique que es lo que está estudiando *</label>
                <div class="controls">
                    <select id="speciality" wire:model.defer="state.speciality"
                        class="form-control @error('speciality') is-invalid @enderror"
                        title="Indique lo que está estudiando">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($specialty as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('speciality')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-5 col-sm-12">
            <div class="form-group">
                <label for="school">Especialidad e Institución *</label>
                <input id="school" wire:model.defer="state.school" type="text"
                    class="form-control @error('school') is-invalid @enderror"
                    title="Indique la institución donde estudia"
                    placeholder="Ejemplo: Mecatrónica, Tecnológico de Chihuahua" />
                @error('school')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    @endif

    @if ($workVisibility)
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="long_take_job">Tiempo transcurrido para obtener el primer empleo *</label>
                <div class="controls">
                    <select id="long_take_job" wire:model.defer="state.long_take_job"
                        class="form-control @error('long_take_job') is-invalid @enderror"
                        title="Indique el tiempo en conseguir su empleo">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        @foreach ($longTakeJob as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('long_take_job')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="hear_about">Medio para obtener el empleo *</label>
                <div class="controls">
                    <select id="hear_about" wire:model.defer="state.hear_about"
                        class="form-control @error('hear_about') is-invalid @enderror"
                        title="Indique el medio para obtener el empleo">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($hearAbout as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('hear_about')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Requisito de contratación</label>
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="form-check">
                        <input class="form-check-input" id="competence1" wire:model.defer="state.competence1"
                            type="checkbox" title="Competencia #1">
                        <label class="form-check-label">Competencias laborales</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="competence2" wire:model.defer="state.competence2"
                            type="checkbox" title="Competencia #2">
                        <label class="form-check-label">Título Profesional</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="competence3" wire:model.defer="state.competence3"
                            type="checkbox" title="Competencia #3">
                        <label class="form-check-label">Examen de selección</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="competence4" wire:model.defer="state.competence4"
                            type="checkbox" title="Competencia #4">
                        <label class="form-check-label">Idioma Extranjero</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="competence5" wire:model.defer="state.competence5"
                            type="checkbox" title="Competencia #5">
                        <label class="form-check-label">Actitudes y habilidades socio-comunicativas (principios y
                            valores)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="competence6" wire:model.defer="state.competence6"
                            type="checkbox" title="Competencia #6">
                        <label class="form-check-label">Ninguno</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="form-group">
                <label for="language_most_spoken">Idioma que utiliza en su trabajo actual *</label>
                <div class="controls">
                    <select id="language_most_spoken" wire:model.defer="state.language_most_spoken"
                        class="form-control @error('language_most_spoken') is-invalid @enderror"
                        title="Idioma que es más utilizado en su trabajo">
                        <option value="" selected="" disabled="">Selecciona una lengua</option>
                        @foreach ($languages as $language)
                        <option value="{{ $language->name }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('language_most_spoken')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="speak_percent">% Hablar</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('speak_percent')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input id="speak_percent" wire:model.defer="state.speak_percent" type="text" class="form-control"
                        readonly title="Porcentaje del habla" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('speak_percent')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="write_percent">% Escribir</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('write_percent')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input id="write_percent" wire:model.defer="state.write_percent" type="text" class="form-control"
                        readonly title="Porcentaje de escritura" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('write_percent')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="read_percent">% Leer</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('read_percent')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input id="read_percent" wire:model.defer="state.read_percent" type="text" class="form-control"
                        readonly title="Porcentaje de lectura" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('read_percent')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label for="listen_percent">% Escuchar</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('listen_percent')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input id="listen_percent" wire:model.defer="state.listen_percent" type="text" class="form-control"
                        readonly title="Porcentaje de escucha" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('listen_percent')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
            <div class="form-group">
                <label for="seniority">Antigüedad en el empleo actual *</label>
                <div class="controls">
                    <select id="seniority" wire:model.defer="state.seniority"
                        class="form-control @error('seniority') is-invalid @enderror"
                        title="Indique la antigüedad en el empleo actual">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($seniority as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('seniority')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
            <div class="form-group">
                <label for="year">Año de ingreso *</label>
                <select id="year" wire:model.defer="state.year" title="Por favor selecciona tu año de ingreso"
                    class="form-control @error('year') is-invalid @enderror">
                    <option value="" selected="" disabled="">
                        Selecciona año de egreso
                    </option>
                    @for ($i = 1990; $i < Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                        </option>
                        @endfor
                </select>
                @error('year')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="salary">Ingreso (Salario minimo diario) *</label>
                <div class="controls">
                    <select id="salary" wire:model.defer="state.salary"
                        class="form-control @error('salary') is-invalid @enderror" title="Indique su salario">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($salary as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('salary')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="management_level">Nivel jerárquico en el trabajo *</label>
                <div class="controls">
                    <select id="management_level" wire:model.defer="state.management_level"
                        class="form-control @error('management_level') is-invalid @enderror"
                        title="Indique el nivel jerárquico">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($managementLevel as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('management_level')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="job_condition">Condición de trabajo *</label>
                <div class="controls">
                    <select id="job_condition" wire:model.defer="state.job_condition"
                        class="form-control @error('job_condition') is-invalid @enderror"
                        title="Indique la condición de su trabajo">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($jobCondition as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('job_condition')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="job_relationship">Relación del trabajo con su área de formación *</label>
                <div class="controls">
                    <select id="job_relationship" wire:model.defer="state.job_relationship"
                        class="form-control @error('job_relationship') is-invalid @enderror"
                        title="Indique la relación con su área de formación">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @for ($i = 0; $i < 101; $i+=20) <option value="{{ $i }}">{{ $i }}%</option>
                            @endfor
                    </select>
                </div>
                @error('job_relationship')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="business_name">Razón Social *</label>
                <input id="business_name" wire:model.defer="state.business_name" type="text"
                    class="form-control @error('business_name') is-invalid @enderror"
                    title="Indique el nombre de la empresa" placeholder="Razón Social" />
                @error('business_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="business_activity">Giro o actividad principal de la empresa u organismo *</label>
                <input id="business_activity" wire:model.defer="state.business_activity" type="text"
                    class="form-control @error('business_activity') is-invalid @enderror"
                    title="Indique el giro de la empresa"
                    placeholder="Giro o actividad principal de la empresa u organismo. Ejemplo: Industrial, Comercial, etc." />
                @error('business_activity')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="address">Domicilio *</label>
                <input id="address" wire:model.defer="state.address" type="text"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Calle #Número"
                    title="Indique el domicilio de la empresa" autocomplete="off" />
                @error('address')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="zip">Código Postal *</label>
                <input id="zip" wire:model.defer="state.zip" type="text" onkeypress="validateNumbers(event);"
                    class="form-control @error('zip') is-invalid @enderror" placeholder="Código Postal"
                    title="Indique el código postal de la empresa" autocomplete="off" />
                @error('zip')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="suburb">Colonia *</label>
                <input id="suburb" wire:model.defer="state.suburb" type="text"
                    class="form-control @error('suburb') is-invalid @enderror" placeholder="Colonia"
                    title="Indique la colonia de la empresa" autocomplete="off" />
                @error('suburb')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="state">Estado *</label>
                <input id="state" wire:model.defer="state.state" type="text"
                    class="form-control @error('state') is-invalid @enderror" placeholder="Estado"
                    title="Indique el estado de la empresa" autocomplete="off" />
                @error('state')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="city">Ciudad *</label>
                <input id="city" wire:model.defer="state.city" type="text"
                    class="form-control @error('city') is-invalid @enderror" placeholder="Ciudad"
                    title="Indique la ciudad de la empresa" autocomplete="off" />
                @error('city')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="municipality">Municipio *</label>
                <input id="municipality" wire:model.defer="state.municipality" type="text"
                    class="form-control @error('municipality') is-invalid @enderror" placeholder="Municipio"
                    title="Indique el municipio de la empresa" autocomplete="off" />
                @error('municipality')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="phone">Teléfono *</label>
                <input id="phone" wire:model.defer="state.phone" type="text" maxlength="10"
                    onkeypress="validateNumbers(event);" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Teléfono" title="Indique el teléfono de la empresa" autocomplete="off" />
                @error('phone')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="fax">Fax</label>
                <input id="fax" wire:model.defer="state.fax" type="text" onkeypress="validateNumbers(event);"
                    class="form-control @error('fax') is-invalid @enderror" placeholder="Fax"
                    title="Indique el fax de la empresa" autocomplete="off" />
                @error('fax')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="web_page">Página Web</label>
                <input id="web_page" wire:model.defer="state.web_page" type="text"
                    class="form-control @error('web_page') is-invalid @enderror" placeholder="Página Web"
                    title="Indique la página web de la empresa" autocomplete="off">
                @error('web_page')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="boss_email">Correo electrónico del jefe inmediato</label>
                <input id="boss_email" wire:model.defer="state.boss_email" type="email"
                    class="form-control @error('boss_email') is-invalid @enderror"
                    placeholder="Correo electrónico del jefe" title="Indique el correo del jefe inmediato"
                    autocomplete="off" />
                @error('boss_email')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="business_structure">Su empresa u organismo es *</label>
                <div class="controls">
                    <select id="business_structure" wire:model.defer="state.business_structure"
                        class="form-control @error('business_structure') is-invalid @enderror"
                        title="Por favor mencione el tipo de empresa">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($businessStructure as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('business_structure')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="company_size">Tamaño de la empresa u organismo *</label>
                <div class="controls">
                    <select id="company_size" wire:model.defer="state.company_size"
                        class="form-control @error('company_size') is-invalid @enderror"
                        title="Por favor mencione el tamaño de la empresa">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($companySize as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @error('company_size')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="business_activity_selector">Actividad económica de la empresa u organismo *</label>
                <div class="controls">
                    <select id="business_activity_selector" wire:model.defer="state.business_activity_selector"
                        class="form-control @error('business_activity_selector') is-invalid @enderror"
                        title="Por favor mencione el tipo de actividad">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($businessActivity as $activity)
                        <option value="{{ $activity->name }}">{{ $activity->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('business_activity_selector')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    @endif

    <div class="row mt-2 pb-2 d-flex align-items-center flex-column">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <button class="btn btn-block bg-gradient-primary" wire:click="save">Guardar Encuesta</button>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <a href="{{ route('graduate.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>