<div>
    <x-header title="Expectativas y Actualización"
        header="Expectativas de desarrollo, superación profesional y de actualización" />

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="courses_yes_no">¿Le gustaria tomar cursos de actualización? *</label>
                <div class="controls">
                    <select id="courses_yes_no" wire:model.defer="state.courses_yes_no"
                        class="form-control @error('courses_yes_no') is-invalid @enderror"
                        title="¿Le interesa tomar cursos?" wire:change="active">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('courses_yes_no')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="courses">Mencionar cursos</label>
                <input id="courses" wire:model.defer="state.courses" type="text" class="form-control"
                    @if(!$coursesActive) disabled="" @endif title="Mencionar los cursos, como cursos de marketing"
                    placeholder="Mencione cuáles serían de su agrado">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="master_yes_no">¿Le gustaria tomar algún posgrado? *</label>
                <div class="controls">
                    <select id="master_yes_no" wire:model.defer="state.master_yes_no"
                        class="form-control @error('master_yes_no') is-invalid @enderror"
                        title="¿Le interesa tomar algún posgrado?" wire:change="active">
                        <option value="" selected="" disabled="">Selecciona una opción</option>
                        @foreach ($yesNoOptions as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('master_yes_no')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="master">Posgrado</label>
                <input id="master" wire:model.defer="state.master" type="text" class="form-control" @if(!$mastersActive)
                    disabled="" @endif title="Mencionar los posgrados, como ejemplo en mecatrónica"
                    placeholder="Mencione cuál sería de su agrado">
            </div>
        </div>
    </div>

    <x-save-component route='graduate.dashboard' />
</div>