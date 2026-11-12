
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agropecuaria Agrovalle</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <a class="navbar-brand ps-3" href="/productos">Agropecuaria Agrovalle</a>
            
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           <div class="sb-sidenav-menu-heading">Gestión</div>
                        <a class="nav-link" href="{{ route('productos.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes-stacked"></i></div>
                            Productos
                        </a>
                        <a class="nav-link" href="{{ route('productos.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Nuevo Producto
                        </a>
                        <div class="sb-sidenav-menu-heading">Personal</div>
                        <a class="nav-link" href="{{ Route::has('empleados.index') ? route('empleados.index') : url('/empleados') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users text-warning"></i></div>
                            Recursos Humanos
                        </a>
                        <div class="sb-sidenav-menu-heading">Insumos</div>
                        <a class="nav-link" href="{{ Route::has('insumos.index') ? route('empleados.index') : url('/empleados') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users text-warning"></i></div>
                            
                        </a>
                    </div>
                    </div>
                  <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    Administrador
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
                        <div>&copy; 2026 Agropecuaria Agrovalle - Sistema de Gestión Agropecuaria</div>
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
