@extends('layouts.admin')

@section('titulo', 'Editar Proveedor')

@section('contenido')
<h1 class="h3 text-gray-800 mb-3">Editar Proveedor</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('proveedores.update', $proveedores) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">RTN (14 digitos)</label>
                    <input type="text" name="rtn" maxlength="14" class="form-control" value="{{ old('rtn', $proveedores->rtn) }}" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Empresa (razon social)</label>
                    <input type="text" name="empresa" class="form-control" value="{{ old('empresa', $proveedores->empresa) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contacto (asesor comercial)</label>
                    <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $proveedores->contacto) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefono (8 digitos, inicia con 2, 3, 8 o 9)</label>
                    <input type="text" name="telefono" maxlength="8" class="form-control" value="{{ old('telefono', $proveedores->telefono) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="Quimicos" {{ old('categoria', $proveedores->categoria) == 'Quimicos' ? 'selected' : '' }}>Quimicos</option>
                        <option value="Semilleros" {{ old('categoria', $proveedores->categoria) == 'Semilleros' ? 'selected' : '' }}>Semilleros</option>
                        <option value="Maquinaria" {{ old('categoria', $proveedores->categoria) == 'Maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Limite de credito (L.)</label>
                    <input type="number" name="limite_credito" step="0.01" min="0" class="form-control" value="{{ old('limite_credito', $proveedores->limite_credito) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Dias de credito</label>
                    <select name="dias_credito" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="15" {{ old('dias_credito', $proveedores->dias_credito) == '15' ? 'selected' : '' }}>15 dias</option>
                        <option value="30" {{ old('dias_credito', $proveedores->dias_credito) == '30' ? 'selected' : '' }}>30 dias</option>
                        <option value="45" {{ old('dias_credito', $proveedores->dias_credito) == '45' ? 'selected' : '' }}>45 dias</option>
                        <option value="60" {{ old('dias_credito', $proveedores->dias_credito) == '60' ? 'selected' : '' }}>60 dias</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="1" {{ old('estado', $proveedores->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('estado', $proveedores->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de registro</label>
                    <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $proveedores->fecha_registro) }}" required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Actualizar</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection