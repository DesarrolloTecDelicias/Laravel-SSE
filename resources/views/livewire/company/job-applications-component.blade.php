<div>
    <x-header title="Solicitud Empleos/Residencias" />

    <div class="row">
        <div class="form-group col-12">
            <label for="image">Seleccione una imagen de promoción</label>
            <input id="image" wire:model.defer="image" type="file" accept="image/png, image/jpeg, ,image/jpg"
                class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror

            @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" alt="" width="100%">
            </div>
            @else
            @if (array_key_exists('id', $state) && $image == null)
            <img src="{{ asset('storage/job_aplications/'.$state['photo_path'])}}" alt={{ $state['photo_path'] }} title="Imagen">
            @endif
            @endif
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="type">Tipo de formato</label>
                <div class="controls">
                    <select id="type" wire:model.defer="state.type"
                        class="form-control @error('type') is-invalid @enderror" title="Tipo de formato"
                        wire:change="changeType">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
                        </option>
                        <option value="1">Residencia</option>
                        <option value="2">Trabajo</option>
                    </select>
                </div>
                @error('type')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="career_id">Perfil Requerido(Carrera)</label>
                <div class="controls">
                    <select id="career_id" wire:model.defer="state.career_id"
                        class="form-control @error('career_id') is-invalid @enderror" title="Carrera">
                        <option value="" selected="" disabled="">
                            Selecciona una opción
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

        <x-input-component idInput='vacancies' title="Número de vacantes" />
    </div>

    @if ($schoolVisibility)
    <hr>
    <div class="row">
        <x-input-component idInput='name' title="Nombre del Proyecto" lg="6" />
        <x-input-component idInput='description' title="Descripción de la problemática a resolver" lg="6" />
        <x-select-component idInput='period' title="Período Proyectado" short="periodos" :options="$months" lg="6" />
        <x-input-component idInput='benefits'
            title="Beneficios o algún tipo de apoyo (Beca económica, hospedaje, alimentación, otra)" lg="6" />
        <x-input-component idInput='consultant_name'
            title="Nombre de la persona que podría Asesorar al (los) estudiante (s) con el proyecto" />
        <x-input-component idInput='consultant_phone'
            title="Teléfono de la persona que podría Asesorar al (los) estudiante (s) con el proyecto" />
        <x-input-component idInput='consultant_email'
            title="Correo de la persona que podría Asesorar al (los) estudiante (s) con el proyecto" />
        <x-input-component idInput='consultant_position'
            title="Puesto de la persona que podría Asesorar al (los) estudiante (s) con el proyecto" />
        <x-input-component idInput='in_charge_name'
            title="Nombre de la persona que firmará el acuerdo de trabajo. Alumno(a)- Escuela-Empresa" />
        <x-input-component idInput='in_charge_position'
            title="Puesto de la persona que firmará el acuerdo de trabajo. Alumno(a)- Escuela-Empresa" />
    </div>
    @endif

    @if ($workVisibility)
    <div class="row">
        <x-input-component idInput='area' title="Área de la vacante" />
    </div>
    @endif

    <hr />
    <div class="row">
        <div class="col-12">
            <h4 class="w-100">Datos del contacto</h4>
        </div>
        <x-input-component idInput='contact_name' title="Nombre de la persona a quien contactarán los interesados" />
        <x-input-component idInput='contact_phone'
            title="Teléfono de la persona a quien contactarán los interesados" />
        <x-input-component idInput='contact_email' title="Correo de la persona a quien contactarán los interesados" />
    </div>
    <x-save-component route='company.application.table' title="Guardar Formato" />

</div>