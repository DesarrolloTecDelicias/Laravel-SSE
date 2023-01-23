<div class="{{ "col-lg-$lg col-md-$md col-sm-$sm" }}">
    <!-- small box -->
    <div class="{{ "small-box bg-$bg" }}">
        <div class="inner">
            <h3>{{ $value }}</h3>
            <p>{{ $title }}</p>
        </div>
        <div class="icon">
            <i class="{{ "ion ion-$icon" }}"></i>
        </div>
        <a href="{{ route($route) }}" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>