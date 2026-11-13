@extends('layouts.admin')

@section('titulo', 'Editar Expediente')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-user-edit text-success me-2"></i> Editar Expediente
        </h1>
        <p class="text-muted mb-0">AgroValle | Actualizacion de informacion del personal</p>
    </div>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-file-signature me-2"></i> Actualizar Datos del Empleado
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-light border mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x text-success me-3"></i>
                    <div>
                        <strong class="text-dark">{{ $empleados->nombre }} {{ $empleados->apellido }}</strong>
                        <div class="small text-muted">DNI: {{ $empleados->identidad }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('empleados.update', $empleados) }}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-id-card me-2"></i> Informacion Personal
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">DNI <span class="text-danger">*</span></label>
                        <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad', $empleados->identidad) }}" required>
                        @error('identidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Correo electronico <span class="text-danger">*</span></label>
                        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $empleados->correo) }}" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $empleados->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Apellido <span class="text-danger">*</span></label>
                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $empleados->apellido) }}" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-briefcase me-2"></i> Informacion Laboral
                </h6>
                @php
                    $c = old('cargo', $empleados->cargo);
                @endphp
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Cargo <span class="text-danger">*</span></label>
                        <select name="cargo" class="form-select @error('cargo') is-invalid @enderror" required>
                            <option value="">Seleccione un cargo</option>
                            <option value="Ingeniero Agronomo" {{ $c == 'Ingeniero Agronomo' ? 'selected' : '' }}>Ingeniero Agronomo</option>
                            <option value="Asesor Tecnico de Campo" {{ $c == 'Asesor Tecnico de Campo' ? 'selected' : '' }}>Asesor Tecnico de Campo</option>
                            <option value="Jefe de Bodega Central" {{ $c == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                            <option value="Operador de Maquinaria" {{ $c == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                            <option value="Cajero" {{ $c == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Salario Mensual <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" step="0.01" min="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $empleados->salario) }}" required>
                        </div>
                        @error('salario')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de Ingreso <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleados->fecha_ingreso) }}" required>
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Estado <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="1" {{ old('estado', $empleados->estado) == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('estado', $empleados->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
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
                        <i class="fas fa-save me-1"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection