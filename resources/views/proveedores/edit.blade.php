@extends('layouts.admin')

@section('titulo', 'Editar Proveedor')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-edit text-success me-2"></i> Editar Proveedor
        </h1>
        <p class="text-muted mb-0">AgroValle | Actualizacion de informacion del proveedor</p>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-file-signature me-2"></i> Actualizar Datos del Proveedor
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-light border mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-industry fa-2x text-success me-3"></i>
                    <div>
                        <strong class="text-dark">{{ $proveedores->empresa }}</strong>
                        <div class="small text-muted">RTN: {{ $proveedores->rtn }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('proveedores.update', $proveedores) }}" method="POST">
                @csrf
                @method('PUT')

                @php
                    $cat = old('categoria', $proveedores->categoria);
                    $dias = old('dias_credito', $proveedores->dias_credito);
                    $est = old('estado', $proveedores->estado);
                @endphp

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-building me-2"></i> Informacion de la Empresa
                </h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">RTN (14 digitos) <span class="text-danger">*</span></label>
                        <input type="text" name="rtn" maxlength="14" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn', $proveedores->rtn) }}" required>
                        @error('rtn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Empresa (razon social) <span class="text-danger">*</span></label>
                        <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa', $proveedores->empresa) }}" required>
                        @error('empresa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Contacto (asesor comercial) <span class="text-danger">*</span></label>
                        <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto', $proveedores->contacto) }}" required>
                        @error('contacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Telefono <span class="text-danger">*</span></label>
                        <input type="text" name="telefono" maxlength="8" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $proveedores->telefono) }}" required>
                        <div class="form-text">8 digitos, inicia con 2, 3, 8 o 9</div>
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-handshake me-2"></i> Condiciones Comerciales
                </h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Categoria <span class="text-danger">*</span></label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="Quimicos" {{ $cat == 'Quimicos' ? 'selected' : '' }}>Quimicos</option>
                            <option value="Semilleros" {{ $cat == 'Semilleros' ? 'selected' : '' }}>Semilleros</option>
                            <option value="Maquinaria" {{ $cat == 'Maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Limite de credito <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" name="limite_credito" step="0.01" min="0" class="form-control @error('limite_credito') is-invalid @enderror" value="{{ old('limite_credito', $proveedores->limite_credito) }}" required>
                        </div>
                        @error('limite_credito')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Dias de credito <span class="text-danger">*</span></label>
                        <select name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="15" {{ $dias == 15 ? 'selected' : '' }}>15 dias</option>
                            <option value="30" {{ $dias == 30 ? 'selected' : '' }}>30 dias</option>
                            <option value="45" {{ $dias == 45 ? 'selected' : '' }}>45 dias</option>
                            <option value="60" {{ $dias == 60 ? 'selected' : '' }}>60 dias</option>
                        </select>
                        @error('dias_credito')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-calendar-alt me-2"></i> Estado y Registro
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Estado <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="1" {{ $est == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $est == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de registro <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $proveedores->fecha_registro) }}" required>
                        @error('fecha_registro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">
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