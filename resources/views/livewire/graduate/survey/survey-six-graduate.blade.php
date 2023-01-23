<div>
    <x-header title="Participación social de los egresados" />

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="organization_yes_no">¿Pertenece a organizaciones sociales? *</label>
                <div class="controls">
                    <select id="organization_yes_no" wire:model.defer="state.organization_yes_no"
                        class="form-control @error('organization_yes_no') is-invalid @enderror"
                        title="¿Pertenece a alguna organización?" wire:change="active">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('organization_yes_no')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="organization">Mencionar organizaciones</label>
                <input id="organization" wire:model.defer="state.organization" type="text" class="form-control"
                    @if(!$organizationActive) disabled="" @endif title="Mencione esas organizaciones"
                    placeholder="Mencione cuáles organizaciones pertenece">
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="agency_yes_no">¿Pertenece a organismos de profesionistas? *</label>
                <div class="controls">
                    <select id="agency_yes_no" wire:model.defer="state.agency_yes_no"
                        class="form-control @error('agency_yes_no') is-invalid @enderror"
                        title="¿Pertenece a algún organismo profesionista?" wire:change="active">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('agency_yes_no')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="agency">Mencionar organismos</label>
                <input id="agency" wire:model.defer="state.agency" type="text" class="form-control" @if(!$agencyActive)
                    disabled="" @endif title="Mencione esos organismos"
                    placeholder="Mencione cuáles organismos pertenece">
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="association_yes_no">¿Pertenece a asociaciones de egresados? *</label>
                <div class="controls">
                    <select id="association_yes_no" wire:model.defer="state.association_yes_no"
                        class="form-control @error('association_yes_no') is-invalid @enderror"
                        title="¿Pertenece a alguna asociaciones de egresados?" wire:change="active">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('association_yes_no')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="association">Mencionar asosiación</label>
                <input id="association" wire:model.defer="state.association" type="text" class="form-control"
                    @if(!$associationActive) disabled="" @endif title="Mencione esas asosiaciones"
                    placeholder="Mencione cuáles asociaciones pertenece">
            </div>
        </div>
    </div>

    <x-save-component route='graduate.dashboard' />
</div>