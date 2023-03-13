<div>
    <x-header title="Perfil del Egresado" />

    <div class="row">
        <x-input-component  idInput='first_name' title="Nombre" />
        <x-input-component  idInput='fathers_surname' title="Apellido Paterno" />
        <x-input-component  idInput='mothers_surname' title="Apellido Materno" />
        <x-input-component  idInput='control_number' title="Número de Control" readonly />
        <x-input-component  idInput='birthday' title="Fecha de Nacimiento" type="date" />
        <x-input-component  idInput='curp' title="CURP"  />
        <x-select-component idInput='sex' title="Sexo" short="sexo" :options="$sexes" />
        <x-select-component idInput='marital_status' title="Estado Civil" short="estado civil" :options="$maritalStatus" />
    </div>

    <hr />

    <div class="row">
        <x-input-component idInput='address' title="Domicilio" />
        <x-input-component idInput='zip_code' title="Código Postal" type="number" />
        <x-input-component idInput='suburb' title="Colonia" />
        <x-input-component idInput='state' title="Estado" />
        <x-input-component idInput='city' title="Ciudad" />
        <x-input-component idInput='municipality' title="Municipio" />
        <x-input-component idInput='phone' title="Teléfono" :required="false" type="number" maxlength="10" />
        <x-input-component idInput='cellphone' title="Teléfono Celular" type="number" maxlength="10" />
        <x-input-component idInput='email' title="Correo Electrónico" type="email" readonly />
    </div>

    <hr />

    <div class="row">
        <x-select-component idInput='income_month' title="Período de Ingreso" short="mes" :options="$months" />
        <x-select-component idInput='income_year' title="Año de Ingreso" short="año" :options="$yearsIncome" />
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="career_id">Carrera de egreso *</label>
                <div class="controls">
                    <select id="career_id" wire:model.defer="state.career_id"
                        class="form-control @error('career_id') is-invalid @enderror" title="Selecciona tu carrera"
                        wire:change="getSpecialties">
                        <option value="" selected="" disabled="">
                            Selecciona tu carrera
                        </option>
                        @foreach ($careers as $career)
                        <option value="{{ $career->id }}">
                            {{ $career->name }}
                        </option>
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
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="specialty_id">Especialidad *</label>
                <div class="controls">
                    <select id="specialty_id" wire:model.defer="state.specialty_id"
                        class="form-control @error('specialty_id') is-invalid @enderror"
                        title="Selecciona tu especialidad">
                        <option value="" selected="" disabled="">
                            Selecciona tu especialidad
                        </option>
                        @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}">
                            {{ $specialty->name }}@if($specialty->reticle). Retícula: {{ $specialty->reticle }} @endif
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('specialty_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <x-select-component idInput='month' title="Período de Egreso" short="mes" :options="$months" />
        <x-select-component idInput='year' title="Año de Egreso" short="año" :options="$years" />        

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="qualified">Titulado *</label>
                <div class="controls">
                    <select id="qualified" wire:model.defer="state.qualified" wire:change="handleQualified"
                        class="form-control @error('qualified') is-invalid @enderror" title="¿Estás titulado?">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('qualified')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        @if ($qualifiedState)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="qualified_year">Año de titulación *</label>
                <select id="qualified_year" wire:model.defer="state.qualified_year"
                    title="Por favor selecciona tu año de titulación"
                    class="form-control @error('qualified_year') is-invalid @enderror">
                    <option value="" selected="" disabled="">
                        Selecciona año de titulación
                    </option>
                    @for ($i = 1990; $i <= Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                        </option>
                        @endfor
                </select>
                @error('qualified_year')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        @endif

    </div>

    <hr />

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="percent_english">Porcentaje de dominio de la lengua extranjera inglés *</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('percent_english')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input id="percent_english" wire:model.defer="state.percent_english" type="text"
                        class="form-control @error('percent_english') is-invalid @enderror" readonly
                        title="Dominio del inglés" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('percent_english')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
                @error('percent_english')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="language_id">Otro Idioma *</label>
                <div class="controls">
                    <select id="language_id" wire:model.defer="state.language_id"
                        class="form-control @error('language_id') is-invalid @enderror"
                        title="Seleccione alguna otra lengua si es hablador de esa lengua">
                        <option value="" selected="" disabled="">
                            Selecciona una lengua
                        </option>
                        @foreach ($languages as $language)
                        <option value="{{ $language->id }}">
                            {{ $language->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('language_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="percent_another_language">Porcentaje de esa lengua *</label>
                <div class="input-group">
                    <span class="input-group-prepend minus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="minus('percent_another_language')">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" id="percent_another_language" wire:model.defer="state.percent_another_language"
                        class="form-control @error('percent_another_language') is-invalid @enderror" value="0" max="100"
                        min="0" readonly placeholder="%" required title="Dominio de otra lengua" />
                    <span class="input-group-append plus">
                        <button type="button" class="btn btn-outline-secondary btn-number"
                            wire:click="plus('percent_another_language')">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
                @error('percent_another_language')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label>Manejo de paquetes computacionales (Especificar): *</label>
                <textarea id="software" wire:model.defer="state.software"
                    class="form-control @error('software') is-invalid @enderror" rows="3"
                    placeholder="Ejemplo: Microsoft Office (Excel, PowerPoint, Word), PowerBI, Wordpress, Adobe Photoshop, Google(Gmail, Docs, Hangouts), Canva, Jira, etc."></textarea>
                @error('software')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <x-save-component route='graduate.dashboard' />
</div>