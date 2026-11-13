<!-- resources/views/auth/login.blade.php --> 
<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
    <title>Iniciar Sesion</title> 
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" /> 
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 
</head> 
<body class="bg-primary"> 
    <div id="layoutAuthentication"> 
        <div id="layoutAuthentication_content"> 
            <main> 
                <div class="container"> 
                    <div class="row justify-content-center"> 
                        <div class="col-lg-5"> 
                             <div class="card shadow-lg border-0 rounded-lg mt-5"> 
                                <div class="card-header bg-dark text-white text-center py-4"> 
                                    <h3 class="font-weight-light my-2"> 
                                        <i class="fas fa-hammer text-warning me-2"></i>AgroValle
                                    </h3> 
                                    <small class="text-muted">Control de Inventario</small> 
                                </div> 
                                <div class="card-body p-4"> 
                                    @if (session('success')) 
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                            {{ session('success') }} 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                                        </div> 
                                    @endif 
 
                                    @error('email')
                                     <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }} 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                                        </div> 
                                    @enderror 
 
                                    <form action="{{ route('login.post') }}" method="POST"> 
                                        @csrf 
                                        <div class="form-floating mb-3"> 
                                            <input class="form-control" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="admin@labendicion.hn" required autofocus /> 
                                            <label for="inputEmail"><i class="fas faenvelope me-1"></i>Correo Electronico</label> 
                                        </div> 
                                        <div class="form-floating mb-3"> 
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Contraseña" required /> 
                                            <label for="inputPassword"><i class="fas fa-lock me-1"></i>Contraseña</label> 
                                        </div> 
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0"> 
                                            <span class="small text-muted">Ingresa con tu correo institucional: <strong>@agrovalle.hn</strong></span> 
                                            <button type="submit" class="btn btn-primary px-4"> 
                                                <i class="fas fa-sign-in-alt me-1"></i>Ingresar 
                                            </button> 
                                        </div> 
                                    </form> 
                                </div> 
                                <div class="card-footer text-center py-3 bg-light"> 
                                    <div class="small"> 
                                        No tienes una cuenta?<a href="{{ route('register') }}">Crear cuenta</a> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </main> 
        </div> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script> 
</body> 
</html>