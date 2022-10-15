<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" title="SSE ITD" class="brand-link">
        <img src="{{asset('image/school/schooliconwhite.png')}}" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('SCHOOL_U_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ empty(Auth::user()->profile_photo_path) 
                    ? Auth::user()->profile_photo_url 
                    : url("storage/".Auth::user()->profile_photo_path) }}"
                class="img-circle" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="{{ route('logout') }}" title="Salir" class="btn btn-link text-light"><i
                class="fas fa-sign-out-alt"></i></a>
        <a title="Mensaje de ayuda" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>