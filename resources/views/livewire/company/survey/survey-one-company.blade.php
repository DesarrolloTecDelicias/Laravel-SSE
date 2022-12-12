<div>
    <x-slot name="title">
        Datos generales
    </x-slot>

    <x-slot name="header">
        Datos generales de la empresa u organismo
    </x-slot>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="business_name">Razón Social *</label>
                <input id="business_name" wire:model.defer="state.business_name" type="text"
                    class="form-control @error('business_name') is-invalid @enderror" placeholder="Razón Social"
                    title="Por favor escriba el nombre de la empresa" />
                @error('business_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="zip">Código Postal *</label>
                <input id="zip" wire:model.defer="state.zip" type="text" onkeypress="validateNumbers(event);"
                    class="form-control @error('zip') is-invalid @enderror" placeholder="Código Postal"
                    title="Por favor escribe tu código postal" />
                @error('zip')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="phone">Teléfono *</label>
                <input id="phone" wire:model.defer="state.phone" type="number" maxlength="10"
                    onkeypress="validateNumbers(event);" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Teléfono" title="Por favor escribe tu teléfono" />
                @error('phone')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="business_id">Actividad económica de la empresa u organismo *</label>
                <div class="controls">
                    <select id="business_id" wire:model.defer="state.business_id"
                        class="form-control @error('business_id') is-invalid @enderror"
                        title="Por favor mencione el tipo de actividad">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($businessActivity as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('business_id')
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
            <a href="{{ route('company.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>