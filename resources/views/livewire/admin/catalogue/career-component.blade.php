<div>
    <x-header title="Carreras" header="Administrar carreras" />

    <div class="pb-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            <x-add-button model="carrera" />

            <div class="pb-4">
                <livewire:tables.admin.catalogue.careers-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <x-modal-header model="Carrera" :stateid="isset($state['id'])" />

                        <div class="modal-body">
                            <x-input-component idInput='name' title="Nombre de la carrera" lg="12" md="12" sm="12" />
                        </div>

                        <x-modal-footer model="Carrera" :stateid="isset($state['id'])" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>