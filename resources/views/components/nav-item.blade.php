<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link {!! $routename == $route ? 'active' : '' !!}">
        <i class="far {!! $routename == $route  ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
        <p>{{ $title }}</p>
    </a>
</li>