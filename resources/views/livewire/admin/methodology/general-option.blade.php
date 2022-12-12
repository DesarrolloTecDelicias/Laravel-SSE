<div>
    <x-slot name="title">
        Resultados por pregunta
    </x-slot>

    <x-slot name="header">
        Reporte por pregunta
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row d-flex justify-content-center">
                <a target="_blank" href="{{ route('pdf.options') }}" class="btn bg-gradient-success mb-4">
                    Imprimir reporte
                </a>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="col-6" wire:ignore>
                    <div class="form-group">
                        <label for="surveySelected">Encuestas</label>
                        <select id="surveySelected" class="select2-class form-control" title="Mencionar encuestas"
                            multiple="multiple">
                            @foreach ($surveys as $key=> $survey)
                            <option @if(array_key_exists($key, $surveySelected))selected @endif value="{{ $key }}">
                                {{ $survey}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6" wire:ignore>
                    <div class="form-group">
                        <label for="careerSelected">Carrera</label>
                        <select id="careerSelected" class="select2-class form-control" title="Mencionar carrera"
                            multiple="multiple">
                            @foreach ($careers as $career)
                            <option @if(array_key_exists($career->id, $careerSelected))selected @endif
                                value="{{ $career->id }}">
                                {{ $career->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <div class="form-group">
                        <label for="dataFilterStart">Fecha de Inicio</label>
                        <div class="controls">
                            <input type="date" class="form-control" wire:model="dataFilterStart" id="dataFilterStart">
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="dataFilterEnd">Fecha Fin</label>
                        <div class="controls">
                            <input type="date" class="form-control" wire:model="dataFilterEnd" id="dataFilterEnd">
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group text-center">
                        <label>Aplicar filtros</label>
                        <div class="controls">
                            <button type="button" class="btn bg-gradient-info w-100" wire:click.prevent="generateData">
                                Generar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="accordion" class="pb-5">
                        @foreach ($surveySelected as $key)

                        @if ($key != null)
                        @php $instance = $hashInstance[$key]; @endphp

                        @if ($instance != null)
                        <div class="row d-flex justify-content-center mb-4" wire:ignore>
                            <div class="card w-75 text-dark">
                                <div class="card-header bg-gray-dark">
                                    <a class="card-link text-light" data-toggle="collapse" href="#collapse{{ $key }}" wire:ignore>
                                        {{ $instance->title }}
                                        <br />
                                        Un total de: {{ $instance->total }} egresado(s) respondió esta
                                        encuesta
                                    </a>
                                </div>
                                <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body text-justify">
                                        <table class="table table-bordered w-100" wire:ignore>
                                            <tbody>
                                                @foreach ($instance->options as $key => $options)
                                                <tr>
                                                    <td colspan="3" class="bg-tec text-white">
                                                        {{ $key}}
                                                    </td>
                                                </tr>
                                                @foreach ($options as $keyOption =>$option)
                                                <tr>
                                                    <td>{{ $keyOption }}</td>
                                                    <td>{{ $option['quantity'] }}</td>
                                                    <td>{{ $option['percentage'] }}%</td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        @endif
                        @endif

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    @section('scripts')
    <script type="text/javascript">
        $(document.body).on("select2:selecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('addCareer', career)
            });
                    
            $(document.body).on("select2:unselecting", "#careerSelected", (e) => {
                const career = e.params.args.data.id;
                Livewire.emit('removeCareer', career)
            });

            $(document.body).on("select2:selecting", "#surveySelected", (e) => {
                const survey = e.params.args.data.id;
                Livewire.emit('addSurvey', survey)
            });

            $(document.body).on("select2:unselecting", "#surveySelected", (e) => {
                const survey = e.params.args.data.id;
                Livewire.emit('removeSurvey', survey)
            });
    </script>

    @endsection
</div>
</div>