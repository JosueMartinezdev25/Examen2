@extends('layouts.admin')

@section('titulo', 'Editar Expediente')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">✏️ Editar Expediente del Empleado</h1>
    <small class="text-muted">Modificando registro de: <strong>{{ $empleado->nombre }} {{ $empleado->apellido }}</strong> (DNI: {{ $empleado->identidad }})</small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-warning text-dark py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-edit me-2"></i>Actualizar Datos Contractuales</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('empleados.update', $empleado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">DNI (13 dígitos, sin guiones) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad', $empleado->identidad) }}">
                    @error('identidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Correo <span class="text-danger">*</span></label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $empleado->correo) }}">
                    @error('correo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $empleado->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $empleado->apellido) }}">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Cargo <span class="text-danger">*</span></label>
                    @php $c = old('cargo', $empleado->cargo); @endphp
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="Ingeniero Agrónomo" {{ $c == 'Ingeniero Agrónomo' ? 'selected' : '' }}>Ingeniero Agronomo</option>
                        <option value="Asesor Técnico de Campo" {{ $c == 'Asesor Técnico de Campo' ? 'selected' : '' }}>Asesor Tecnico de Campo</option>
                        <option value="Jefe de Bodega Central" {{ $c == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                        <option value="Operador de Maquinaria" {{ $c == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                        <option value="Cajero" {{ $c == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Salario Mensual (Lempiras) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">L.</span>
                        <input type="number" step="0.01" min="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $empleado->salario) }}">
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Fecha de Ingreso <span class="text-danger">*</span></label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}">
                    @error('fecha_ingreso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="1" {{ old('estado', $empleado->estado) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('estado', $empleado->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync me-1"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection