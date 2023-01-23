<div class="{{ "col-lg-$lg col-md-$md col-sm-$sm" }}">
    <div class="form-group">
        <label for="{{ $idInput }}">
            {{ $title }} {{ $required ? "*" : "" }}
        </label>
        
        <input 
            id="{{ $idInput }}" 
            wire:model.defer={{ "state.$idInput" }} 
            type="{{ $type }}"
            class="form-control @error($idInput)is-invalid @enderror" 
            placeholder="{{ ucwords($title) }}"
            title="Por favor indica tu {{ strtolower($title) }}" 
            {{ $readonly ? "readonly" : "" }}
            {{ $maxLength ? "maxlength=\"$maxLength\"" : "" }} />

        @error($idInput)
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>