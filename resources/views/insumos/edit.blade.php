@extends('layouts.admin')

@section('titulo', 'Editar Insumo')

@section('contenido')
<h1 class="h3 text-gray-800 mb-3">Editar Insumo</h1>

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
        <form action="{{ route('insumos.update', $insumos) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Codigo (SKU)</label>
                    <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $insumos->codigo) }}" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $insumos->nombre) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="Fertilizantes" {{ old('categoria', $insumos->categoria) == 'Fertilizantes' ? 'selected' : '' }}>Fertilizantes</option>
                        <option value="Semillas Certificadas" {{ old('categoria', $insumos->categoria) == 'Semillas Certificadas' ? 'selected' : '' }}>Semillas Certificadas</option>
                        <option value="Agroquimicos" {{ old('categoria', $insumos->categoria) == 'Agroquimicos' ? 'selected' : '' }}>Agroquimicos</option>
                        <option value="Herramientas" {{ old('categoria', $insumos->categoria) == 'Herramientas' ? 'selected' : '' }}>Herramientas</option>
                        <option value="Sistemas de Riego" {{ old('categoria', $insumos->categoria) == 'Sistemas de Riego' ? 'selected' : '' }}>Sistemas de Riego</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control" value="{{ old('fabricante', $insumos->fabricante) }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" step="0.01" min="0.01" class="form-control" value="{{ old('precio', $insumos->precio) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Costo</label>
                    <input type="number" name="costo" step="0.01" min="0" class="form-control" value="{{ old('costo', $insumos->costo) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Inventario</label>
                    <input type="number" name="inventario" min="0" class="form-control" value="{{ old('inventario', $insumos->inventario) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Número de lote</label>
                    <input type="text" name="numero_lote" class="form-control" value="{{ old('numero_lote', $insumos->numero_lote) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de registro</label>
                    <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $insumos->fecha_registro) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de vencimiento (opcional)</label>
                    <input type="date" name="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento', $insumos->fecha_vencimiento) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Foto del empaque (jpg, png, webp, máx. 5MB)</label>
                    @if ($insumos->imagen)
                        <img src="{{ asset('uploads/insumos/' . $insumos->imagen) }}" class="rounded mb-2 d-block" style="width: 80px;">
                    @endif
                    <input type="file" name="imagen" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Actualizar</button>
                <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection