<!-- <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
    <img class="rounded-pill img-fluid" width="65" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none" href="#">{{Auth::user()->name}}</a>
      </h5>
      @foreach(Auth::user()->getRoleNames() as $role)
      <p class="mt-1 mb-0">{{$role}}</p>
      @endforeach

    </div>
  </div>

  <div class="search position-relative text-center px-4 py-3 mt-2">
    <input type="text" class="form-control w-100 border-0 bg-transparent" placeholder="Search here">
    <i class="fa fa-search position-absolute d-block fs-6"></i>
  </div>

  <ul class="categories list-unstyled">
    <li class="has-dropdown">
      <i class="uil-estate fa-fw"></i><a href="#"> Dashboard</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>

    @can('Administracion')
    <li class="has-dropdown">
      <i class="uil-setting"></i> <a href="#">Administracion</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="{{route('tenant.users',tenant('id'))}}">Gestionar usuarios</a></li>
        <li><a href="{{route('tenant.roles',tenant('id'))}}">Gestionar roles</a></li>
      </ul>
    </li>
    @endcan

    @can('backups')
    <li class="">
      <i class="uil-folder"></i><a href="{{route('tenant.backups',tenant('id'))}}">backups</a>
    </li>
    @endcan

    @can('Gestionar Bitacora')
    <li class="">
      <i class="uil-folder"></i><a href="{{route('tenant.bitacoras.index',tenant('id'))}}">Bitacora</a>
    </li>
    @endcan
    <li class="has-dropdown">
      <i class="uil-calendar-alt"></i><a href="#"> Calender</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-envelope-download fa-fw"></i><a href="#"> Mailbox</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-shopping-cart-alt"></i><a href="#"> Ecommerce</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-bag"></i><a href="#"> Projects</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="#"> Settings</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-chart-pie-alt"></i><a href="#"> Components</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-panel-add"></i><a href="#"> Charts</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li class="">
      <i class="uil-map-marker"></i><a href="#"> Maps</a>
    </li>
  </ul>
</aside> -->

<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
  <div class="h-19">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{route('tenant.dashboard',tenant('id'))}}">
      @php
      use App\Models\Tenant;
      @endphp
      <img src="{{Tenant::find(tenant('id'))->logo}}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
      <img src="{{Tenant::find(tenant('id'))->logo}}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
      <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{Tenant::find(tenant('id'))->name}}</span>
    </a>
  </div>

  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

  <ul class="flex flex-col pl-0 mb-0">
    <li class="mt-0.5 w-full">
      <a class="@yield('aside-dashboard', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.dashboard',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
      </a>
    </li>
    <li class="mt-0.5 w-full">
      <a class="@yield('aside-diagramas', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.diagramas',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Procesos de negocios</span>
      </a>
    </li>

    @can('Administracion')
    <div class="mt-0.5 w-full">
      <div class=" dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.roles',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-collection"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Administracion</span>
      </div>
      <ul class="sidebar-dropdown list-unstyled">
        <li class="mt-1 w-full">
          <a class=" @yield('aside-usuarios', '') dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-8 transition-colors" href="{{route('tenant.users',tenant('id'))}}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-circle-08"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Usuarios</span>
          </a>
        </li>
        <li class="mt-1 w-full">
          <a class=" @yield('aside-roles', '') dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-8 transition-colors" href="{{route('tenant.roles',tenant('id'))}}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-fat-add"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Roles</span>
          </a>
        </li>
      </ul>
    </div>
    @endcan

    @can('backups')
    <li class="mt-0.5 w-full">
      <a class=" @yield('aside-backup', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.backups',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-support-16"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Backups</span>
      </a>
    </li>
    @endcan

    @can('Gestionar Bitacora')
    <li class="mt-0.5 w-full">
      <a class=" @yield('aside-bitacora', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.bitacoras.index',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-single-copy-04"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Bitacora</span>
      </a>
    </li>
    @endcan

    <li class="mt-0.5 w-full">
      <a class=" @yield('aside-personalizacion', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.personalizacion',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-palette"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Personalizacion</span>
      </a>
    </li>

    <div class="mt-0.5 w-full">
      <div class=" dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="#">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-collection"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Procesos Crediticios</span>
      </div>
      <ul class="sidebar-dropdown list-unstyled">
        <li class="mt-1 w-full">
          <a class=" @yield('aside-creditos', '') dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-8 transition-colors" href="{{route('tenant.creditos.index',tenant('id'))}}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-fat-add"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Creditos</span>
          </a>
        </li>
        <li class="mt-1 w-full">
          <a class=" @yield('aside-solicitudes', '') dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-8 transition-colors" href="{{route('tenant.solicitudes.index',tenant('id'))}}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-fat-add"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Solicitudes</span>
          </a>
        </li>
      </ul>
    </div>

    <li class="mt-0.5 w-full">
      <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="#">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Metodo Pago</span>
      </a>
    </li>

    <li class="w-full mt-4">
      <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Cuenta</h6>
    </li>

    <li class="mt-0.5 w-full">
      <a class=" @yield('aside-perfil', '') dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('tenant.perfil',tenant('id'))}}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
          <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Perfil</span>
      </a>
    </li>

    <li class="mt-0.5 w-full">
      <form action="{{route('tenant.logout', tenant('id'))}}" method="post">
        @csrf
        <button type="submit" class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Salir</span>
        </button>
      </form>
    </li>
  </ul>

</aside>

<!-- end sidenav -->