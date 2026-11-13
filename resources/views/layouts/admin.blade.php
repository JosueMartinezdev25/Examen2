<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('titulo', 'Panel') - Agropecuaria Agrovalle</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
                <i class="fas fa-seedling text-success me-1"></i> AGROVALLE
            </a>

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>

            <div class="ms-auto d-flex align-items-center me-3">
                <span class="text-light me-3">
                    <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesion
                    </button>
                </form>
            </div>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="text-center py-3 border-bottom border-secondary">
                                <i class="fas fa-seedling fa-2x text-success"></i>
                                <div class="fw-bold text-white mt-1">AGROVALLE</div>
                                <small class="text-muted">Honduras</small>
                            </div>

                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Inventario</div>
                            <a class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}" href="{{ route('insumos.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes-stacked"></i></div>
                                Insumos
                            </a>

                            <div class="sb-sidenav-menu-heading">Proveedores</div>
                            <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}" href="{{ Route::has('proveedores.index') ? route('proveedores.index') : url('/proveedores') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-industry text-warning"></i></div>
                                Fabricantes y Proveedores
                            </a>

                            <div class="sb-sidenav-menu-heading">Recursos Humanos</div>
                            <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}" href="{{ Route::has('empleados.index') ? route('empleados.index') : url('/empleados') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-warning"></i></div>
                                Recursos Humanos y Personal Tecnico
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @yield('contenido')
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small text-muted">
                            <div>&copy; {{ date('Y') }} Agropecuaria Agrovalle - Sistema de Gestion Agropecuaria</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('sb-admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('sb-admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('sb-admin/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>