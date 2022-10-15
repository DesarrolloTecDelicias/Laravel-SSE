<div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{route('welcome')}}"><img style="width:330px; height:150px;"
                    src="{{asset('image/school/logonew.png')}}" alt=""></a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo
            electrónico y le enviaremos
            un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <div class="block">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" wire:model.defer="email" class="block mt-1 w-full" :value="old('email')" required
                autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">

            <button wire:click="sentEmail"
                class="inline-flex items-center px-4 py-2  @if($disabled) {!! "bg-gray-300" !!} @else {!! "bg-gray-800" !!}@endif border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                @if($disabled) disabled @endif>
                {{ __('Email Password Reset Link') }}
            </button>

        </div>
    </x-jet-authentication-card>
</div>