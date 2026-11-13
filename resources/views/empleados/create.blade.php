@extends('layouts.admin')

@section('titulo', 'Contratar Empleado')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">➕ Registro de Nuevo Empleado</h1>
    <small class="text-muted">Agropecuaria Agrovalle - Alta en Nómina</small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-file-signature me-2"></i>Expediente Laboral</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">DNI (13 dígitos, sin guiones) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}" placeholder="Ej: 0801199512345">
                    @error('identidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Correo <span class="text-danger">*</span></label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="Ej: juan@agrovalle.com">
                    @error('correo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Juan Carlos">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" placeholder="Ej: Pérez">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Cargo <span class="text-danger">*</span></label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="">-- Seleccione un Cargo --</option>
                        <option value="Ingeniero Agrónomo" {{ old('cargo') == 'Ingeniero Agrónomo' ? 'selected' : '' }}>Ingeniero Agrónomo</option>
                        <option value="Asesor Técnico de Campo" {{ old('cargo') == 'Asesor Técnico de Campo' ? 'selected' : '' }}>Asesor Técnico de Campo</option>
                        <option value="Jefe de Bodega Central" {{ old('cargo') == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                        <option value="Operador de Maquinaria" {{ old('cargo') == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                        <option value="Cajero" {{ old('cargo') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Salario Mensual (Lempiras) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">L.</span>
                        <input type="number" step="0.01" min="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" placeholder="0.00">
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Fecha de Ingreso <span class="text-danger">*</span></label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', date('Y-m-d')) }}">
                    @error('fecha_ingreso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('estado') === '0' ? 'selected' : '' }}>Inactivo</option>
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
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Guardar en Nómina
                </button>
            </div>
        </form>
    </div>
</div>
@endsection