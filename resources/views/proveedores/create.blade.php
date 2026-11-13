@extends('layouts.admin')

@section('titulo', 'Nuevo Proveedor')

@section('contenido')
<h1 class="h3 text-gray-800 mb-3">Registrar Proveedor</h1>

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
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">RTN (14 digitos)</label>
                    <input type="text" name="rtn" maxlength="14" class="form-control" value="{{ old('rtn') }}" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Empresa (razon social)</label>
                    <input type="text" name="empresa" class="form-control" value="{{ old('empresa') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contacto (asesor comercial)</label>
                    <input type="text" name="contacto" class="form-control" value="{{ old('contacto') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefono (8 digitos, inicia con 2, 3, 8 o 9)</label>
                    <input type="text" name="telefono" maxlength="8" class="form-control" value="{{ old('telefono') }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="Quimicos" {{ old('categoria') == 'Quimicos' ? 'selected' : '' }}>Quimicos</option>
                        <option value="Semilleros" {{ old('categoria') == 'Semilleros' ? 'selected' : '' }}>Semilleros</option>
                        <option value="Maquinaria" {{ old('categoria') == 'Maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Limite de crédito (L.)</label>
                    <input type="number" name="limite_credito" step="0.01" min="0" class="form-control" value="{{ old('limite_credito') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Dias de credito</label>
                    <select name="dias_credito" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="15" {{ old('dias_credito') == '15' ? 'selected' : '' }}>15 días</option>
                        <option value="30" {{ old('dias_credito') == '30' ? 'selected' : '' }}>30 días</option>
                        <option value="45" {{ old('dias_credito') == '45' ? 'selected' : '' }}>45 días</option>
                        <option value="60" {{ old('dias_credito') == '60' ? 'selected' : '' }}>60 días</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('estado') === '0' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de registro</label>
                    <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', date('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Guardar</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection