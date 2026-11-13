@extends('layouts.admin')

@section('titulo', 'Contratar Empleado')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-user-plus text-success me-2"></i> Registro de Empleado
        </h1>
        <p class="text-muted mb-0">AgroValle | Registro de nuevo personal</p>
    </div>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-file-signature me-2"></i> Expediente Laboral
            </h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-id-card me-2"></i> Informacion Personal
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">DNI <span class="text-danger">*</span></label>
                        <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}" placeholder="0801199512345" required>
                        @error('identidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Correo electronico <span class="text-danger">*</span></label>
                        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="empleado@agrovalle.com" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej. Juan Carlos" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Apellido <span class="text-danger">*</span></label>
                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" placeholder="Ej. Perez" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-briefcase me-2"></i> Informacion Laboral
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Cargo <span class="text-danger">*</span></label>
                        <select name="cargo" class="form-select @error('cargo') is-invalid @enderror" required>
                            <option value="">Seleccione un cargo</option>
                            <option value="Ingeniero Agronomo" {{ old('cargo') == 'Ingeniero Agronomo' ? 'selected' : '' }}>Ingeniero Agronomo</option>
                            <option value="Asesor Tecnico de Campo" {{ old('cargo') == 'Asesor Tecnico de Campo' ? 'selected' : '' }}>Asesor Tecnico de Campo</option>
                            <option value="Jefe de Bodega Central" {{ old('cargo') == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                            <option value="Operador de Maquinaria" {{ old('cargo') == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                            <option value="Cajero" {{ old('cargo') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Salario Mensual <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" step="0.01" min="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" placeholder="0.00" required>
                            @error('salario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de Ingreso <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', date('Y-m-d')) }}" required>
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Estado <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('estado', '1') == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Guardar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection