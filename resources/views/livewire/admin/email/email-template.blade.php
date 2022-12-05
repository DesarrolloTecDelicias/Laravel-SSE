<div>
    <x-slot name="title">
        Correo Aviso
    </x-slot>

    <x-slot name="header">
        Administrar Correo Aviso
    </x-slot>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex flex-wrap">
                <h5 class="w-100 text-center">Tags para poder emplearse en las plantillas, es importante que se abra con
                    dos caracteres <b> { </b> y cierre de igual forma con 2 caracteres <b> } </b></h5>
                <table class="table table-bordered table-striped collapsed">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th>Tag a usar</th>
                            <th class="text-center">Información que regresa</th>
                            <th class="text-center">Ejemplo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&#123;&#123; $egresado &#125;&#125;</td>
                            <td class="text-center">Este tag permite regresar el nombre completo del egresado</td>
                            <td class="text-center">Miguel Luis Perez Hernandez</td>
                        </tr>
                        <tr>
                            <td>&#123;&#123; $email &#125;&#125;</td>
                            <td class="text-center">Este tag permite regresar el correo del egresado</td>
                            <td class="text-center">correo@gmail.com</td>
                        </tr>                        
                        <tr>
                            <td>&#123;&#123; $escuela &#125;&#125;</td>
                            <td class="text-center">Este tag permite regresar el nombre de la institución</td>
                            <td class="text-center">{{ env('SCHOOL_NAME') }}</td>
                        </tr>
                        <tr>
                            <td>&#123;&#123; $enlace &#125;&#125;</td>
                            <td class="text-center">Este tag permite regresar el enlace del proyecto</td>
                            <td class="text-center">{{ env('PROJECT_URL') }}</td>
                        </tr>
                        <tr>
                            <td>&#123;&#123; $encuestas &#125;&#125;</td>
                            <td class="text-center">Este tag permite regresar una lista con las encuestas pendientes
                            </td>
                            <td class="text-center">
                                <ul>
                                    <li>Perfil del egresado.</li>
                                    <li>Comentarios y sugerencias.</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group" wire:ignore>
                    <label for="body">Escribir Email</label>
                    <textarea id="body" wire:model="email.body">
                        @if (array_key_exists('id', $email))
                        {{ $email['body'] }}  
                        @endif
                    </textarea>
                </div>
                @error('body')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-evenly">
                <button type="button" class="btn bg-gradient-primary" wire:click="save">
                    {{ isset($email['id']) ? 'Editar' : 'Guardar' }}
                </button>
                <button type="button" class="btn bg-gradient-danger"
                    wire:click="launchModal">Cancelar</button>
            </div>            
        </div>
    </div>

    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#body').summernote({
                height: 300,
                lang: 'es-ES',
                placeholder: 'Escribe el correo...',                
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('email.body', contents);
                    }
                },
            });
        });        
    </script>
    @endsection
</div>