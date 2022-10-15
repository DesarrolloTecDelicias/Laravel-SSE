<div>
    <x-slot name="title">
        CV
    </x-slot>

    <x-slot name="header">
        Agregar Currículum
    </x-slot>

    <div class="row d-flex justify-content-sm-center pb-4">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="file">Agregar CV</label>
                    <div class="input-group mb-3">
                        <div class="custom-file" wire:ignore>
                            <input id="file" wire:model="cv" type="file" class="custom-file-input">
                            <label class="custom-file-label" for="file">Elige un archivo</label>
                        </div>
                    </div>
                    @error('cv')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <button type="submit" class="btn btn-block bg-gradient-primary">
                            {{ (Auth::user()->cv != null || Auth::user()->cv !='')
                            ? 'Actualizar' : 'Subir' }} CV
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                        <a href="{{ route('graduate.dashboard') }}" class="btn btn-block bg-gradient-danger">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
        @if (Auth::user()->cv != (null || ''))
        <div class="col-lg-6 col-md-12 col-sm-12">
            <iframe src="{{ asset('storage/pdf/'.Auth::user()->cv)}}" class="w-100" style="height:700px"
                frameborder="0"></iframe>
        </div>
        @endif
    </div>

</div>