<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | AgroValle</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="card shadow border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-success text-white text-center py-4 border-0">
                        <i class="fas fa-user-plus fa-3x mb-3"></i>
                        <h2 class="fw-bold mb-1">AgroValle</h2>
                        <small class="text-white-50">REGISTRO DE PERSONAL</small>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-dark mb-1">Crear cuenta</h4>
                        <br>
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="inputName" class="form-label fw-semibold">
                                    <i class="fas fa-user text-success me-1"></i> Nombre completo
                                </label>
                                <input class="form-control @error('name') is-invalid @enderror" id="inputName" type="text" name="name" value="{{ old('name') }}" placeholder="Ej. Juan Perez" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label fw-semibold">
                                    <i class="fas fa-envelope text-success me-1"></i> Correo institucional
                                </label>
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="empleado@agrovalle.hn" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputPassword" class="form-label fw-semibold">
                                        <i class="fas fa-lock text-success me-1"></i> Contraseña
                                    </label>
                                    <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Contrasena" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputPasswordConfirm" class="form-label fw-semibold">
                                        <i class="fas fa-check-double text-success me-1"></i> Confirmar contrasena
                                    </label>
                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Repetir contrasena" required>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-success py-2 fw-semibold">
                                    <i class="fas fa-user-plus me-2"></i> Registrar cuenta
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light py-3">
                        <small class="text-muted">
                            Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Iniciar sesion</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
</body>
</html>