<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion | AgroValle</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">
                <div class="card shadow border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-success text-white text-center py-4 border-0">
                        <i class="fas fa-seedling fa-3x mb-3"></i>
                        <h2 class="fw-bold mb-1">AgroValle</h2>
                        <small class="text-white-50">
                            Gestion Agropecuaria
                        </small>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                                </button>
                            </div>
                        @endif
                        @error('email')
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label fw-semibold">
                                    <i class="fas fa-envelope me-1 text-success"></i>
                                    Correo electronico
                                </label>
                                <input
                                    class="form-control"
                                    id="inputEmail"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="usuario@agrovalle.hn"
                                    required
                                    autofocus
                                >
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label fw-semibold">
                                    <i class="fas fa-lock me-1 text-success"></i>
                                    Contraseña
                                </label>

                                <input
                                    class="form-control"
                                    id="inputPassword"
                                    type="password"
                                    name="password"
                                    placeholder="Ingresa tu contrasena"
                                    required
                                >
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-success py-2 fw-semibold">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Iniciar sesion
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-center bg-light py-3">

                        <small class="text-muted">

                            No tienes una cuenta?

                            <a href="{{ route('register') }}"
                                class="text-success fw-bold text-decoration-none">

                                Crear cuenta
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
    </script>

</body>
</html>