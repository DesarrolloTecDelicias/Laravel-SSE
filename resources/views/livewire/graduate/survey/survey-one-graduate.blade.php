<div>
    <x-slot name="title">
        Perfil del Egresado
    </x-slot>

    <x-slot name="header">
        Perfil del Egresado
    </x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="first_name">Nombre(s) *</label>
                <input id="first_name" type="text" wire:model.defer="state.first_name"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Nombre"
                    title="Por favor escribe tu nombre(s)" />
                @error('first_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="fathers_surname">Apellido Paterno *</label>
                <input id="fathers_surname" wire:model.defer="state.fathers_surname" type="text"
                    class="form-control @error('fathers_surname') is-invalid @enderror" placeholder="Apellido Paterno"
                    title="Por favor escribe tu apellido paterno" />
                @error('fathers_surname')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="mothers_surname">Apellido Materno *</label>
                <input id="mothers_surname" wire:model.defer="state.mothers_surname" type="text"
                    class="form-control @error('mothers_surname') is-invalid @enderror" placeholder="Apellido Materno"
                    title="Por favor escribe tu apellido materno" />
                @error('mothers_surname')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="control_number">Número de Control *</label>
                <input id="control_number" wire:model.defer="state.control_number" type="text"
                    onkeypress="validateNumbers(event);"
                    class="form-control @error('control_number') is-invalid @enderror" placeholder="Número de Control"
                    title="Por favor escribe tu número de control" readonly />
                @error('control_number')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="birthday">Fecha de Nacimiento *</label>
                <input id="birthday" wire:model.defer="state.birthday" type="date"
                    class="form-control @error('birthday') is-invalid @enderror" placeholder="Fecha de Nacimiento"
                    title="Por favor selecciona tu fecha de nacimiento" />
                @error('birthday')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="curp">CURP *</label>
                <input id="curp" wire:model.defer="state.curp" type="text"
                    class="form-control @error('curp') is-invalid @enderror" placeholder="CURP"
                    title="Por favor escribe tu CURP" />
                @error('curp')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sex">Sexo *</label>
                <div class="controls">
                    <select id="sex" wire:model.defer="state.sex"
                        class="form-control @error('sex') is-invalid @enderror" title="Por favor selecciona tu sexo">
                        <option value="" selected="" disabled="">
                            Selecciona un sexo
                        </option>
                        @foreach ($sexes as $sex)
                        <option value="{{ $sex }}">
                            {{ $sex }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('sex')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="marital_status">Estado Civil *</label>
                <div class="controls">
                    <select id="marital_status" wire:model.defer="state.marital_status"
                        class="form-control @error('marital_status') is-invalid @enderror"
                        title="Por favor selecciona tu estado civil">
                        <option value="" selected="" disabled="">
                            Selecciona un estado civil
                        </option>
                        @foreach ($maritalStatus as $status)
                        <option value="{{ $status }}">
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('marital_status')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="address">Domicilio *</label>
                <input id="address" wire:model.defer="state.address" type="text"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Calle #Número"
                    title="Por favor escribe tu dirección" />
                @error('address')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="zip_code">Código Postal *</label>
                <input id="zip_code" wire:model.defer="state.zip_code" type="text" onkeypress="validateNumbers(event);"
                    class="form-control @error('zip_code') is-invalid @enderror" placeholder="Código Postal"
                    title="Por favor escribe tu código postal" />
                @error('zip_code')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="suburb">Colonia *</label>
                <input id="suburb" wire:model.defer="state.suburb" type="text"
                    class="form-control @error('suburb') is-invalid @enderror" placeholder="Colonia"
                    title="Por favor escribe tu colonia" />
                @error('suburb')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="state">Estado *</label>
                <input id="state" wire:model.defer="state.state" type="text"
                    class="form-control @error('state') is-invalid @enderror" placeholder="Estado"
                    title="Por favor escribe tu estado" />
                @error('state')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="city">Ciudad *</label>
                <input id="city" wire:model.defer="state.city" type="text"
                    class="form-control @error('city') is-invalid @enderror" placeholder="Ciudad"
                    title="Por favor escribe tu ciudad" />
                @error('city')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="municipality">Municipio *</label>
                <input id="municipality" wire:model.defer="state.municipality" type="text"
                    class="form-control @error('municipality') is-invalid @enderror" placeholder="Municipio"
                    title="Por favor escribe tu municipio" />
                @error('municipality')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input id="phone" wire:model.defer="state.phone" type="text" maxlength="10"
                    onkeypress="validateNumbers(event);" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Teléfono" title="Por favor escribe tu teléfono" />
                @error('phone')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="cellphone">Teléfono Celular *</label>
                <input id="cellphone" wire:model.defer="state.cellphone" type="text" maxlength="10"
                    onkeypress="validateNumbers(event);" class="form-control @error('cellphone') is-invalid @enderror"
                    placeholder="Teléfono" title="Por favor escribe tu teléfono" />
                @error('cellphone')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="email">Correo electrónico *</label>
                <input id="email" wire:model.defer="state.email" type="email"
                    class="form-control @error('email') is-invalid @enderror" readonly />
                @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <hr />

    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="income_month">Período de ingreso *</label>
                <div class="controls">
                    <select id="income_month" wire:model.defer="state.income_month"
                        class="form-control @error('income_month') is-invalid @enderror"
                        title="Por favor seleccione un mes">
                        <option value="" selected="" disabled="">
                            Selecciona un mes
                        </option>
                        @foreach ($months as $month)
                        <option value="{{ $month }}">
                            {{ $month }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('income_month')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="income_year">Año de ingreso *</label>
                <select id="income_year" wire:model.defer="state.income_year"
                    title="Por favor selecciona tu año de egreso"
                    class="form-control @error('income_year') is-invalid @enderror">
                    <option value="" selected="" disabled="">
                        Selecciona año de ingreso
                    </option>
                    @for ($i = 1990; $i < Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                        </option>
                        @endfor
                </select>
                @error('income_year')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

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
                            {{ $specialty->name }}
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
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="month">Período de egreso *</label>
                <div class="controls">
                    <select id="month" wire:model.defer="state.month"
                        class="form-control @error('month') is-invalid @enderror" title="Por favor seleccione un mes">
                        <option value="" selected="" disabled="">
                            Selecciona un mes
                        </option>
                        @foreach ($months as $month)
                        <option value="{{ $month }}">
                            {{ $month }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('month')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="year">Año de Egreso *</label>
                <select id="year" wire:model.defer="state.year" title="Por favor selecciona tu año de egreso"
                    class="form-control @error('year') is-invalid @enderror">
                    <option value="" selected="" disabled="">
                        Selecciona año de egreso
                    </option>
                    @for ($i = 1990; $i <= Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
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

    <div class="row mt-2 pb-2 d-flex align-items-center flex-column">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <button class="btn btn-block bg-gradient-primary" wire:click="save">Guardar Encuesta</button>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <a href="{{ route('graduate.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>