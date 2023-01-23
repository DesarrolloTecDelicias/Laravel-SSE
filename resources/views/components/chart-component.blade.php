<div class="{{ "col-lg-$lg col-md-$md col-sm-$sm" }}" wire:ignore>
    <!-- PIE CHART -->
    <div class="card">
        <div class="card-header bg-tec text-white">
            <h3 class="card-title">{{$description}}</h3>
        </div>
        <div class="card-body">
            <canvas id="{{ $idChart }}" width="685" height="{{ $height }}"
                class="chartjs-render-monitor pie-style w-100 h-100"></canvas>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-center">
            <button type="button" class="btn btn-dark" onclick="downloadChart('{{ $idChart }}', '{{ $title }}')">
                Descargar Imagen
            </button>
        </div>
    </div>
    <!-- /.card -->
</div>