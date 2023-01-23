<div class="swiper-slide">
    <div class="container-image">
        <div class="container-loader">
            {!! $icon !!}
        </div>
        <a href="{{ route($route) }}" title="{{ $survey }}">
            <img src="{{asset('image/school/sn'.$number.'.png') }}" />
        </a>
        <div class="container-text">
            <h5>{{ $survey }}</h5>
        </div>
    </div>
</div>