<div class="{{ " col-lg-$lg col-md-$md col-sm-$sm" }}">
    <div class="form-group">
        <label for="{{ $idInput }}">
            {{ $title }} {{ $required ? "*" : "" }}
        </label>
        <div class="controls">
            <select id="{{ $idInput }}" wire:model.defer={{ "state.$idInput" }}
                class="form-control @error($idInput)is-invalid @enderror"
                title="Por favor selecciona {{ strtolower($title) }}">
                <option value="" selected="" disabled="">
                    Selecciona un(a) {{ strtolower($short) }}
                </option>
                @foreach ($options as $option)
                <option value="{{ $option }}">
                    {{ $option }}
                </option>
                @endforeach
            </select>
        </div>
        @error($idInput)
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>