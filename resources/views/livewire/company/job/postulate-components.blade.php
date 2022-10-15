{{-- <div>
    <x-slot name="title">
        Empleos
    </x-slot>

    <x-slot name="header">
        Administrar empleos disponibles
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white sm:rounded-lg">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {!! $tab == 'pills-job' ? 'active' : '' !!}"
                                            id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab"
                                            aria-controls="pills-job" aria-selected="true">TRABAJOS</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {!! $tab == 'pills-profile' ? 'active' : '' !!}"
                                            id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">POSTULADOS</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade {!! $tab == 'pills-job' ? 'show active' : '' !!} "
                                        id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                                        <table class="table table-responsive table-bordered table-striped w-100">
                                            <thead>
                                                <tr
                                                    class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle">
                                                    <th>ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($students as $student)
                                                <tr class="text-xs font-medium text-center">
                                                    <td class="text-left">
                                                    
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info"
                                                            wire:click="setPostulates({{ json_encode($student) }})">Ver Postulados</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade {!! $tab == 'pills-profile' ? 'show active' : '' !!}"
                                        id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        @if ($studentSelected)

                                        <div class="row">
                                        </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>