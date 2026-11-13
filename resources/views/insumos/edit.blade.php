@extends('layouts.admin')

@section('titulo', 'Editar Insumo')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-edit text-success me-2"></i> Editar Insumo
        </h1>
        <p class="text-muted mb-0">AgroValle | Actualización de información del insumo</p>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-file-signature me-2"></i> Actualizar Datos del Insumo
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-light border mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-box fa-2x text-success me-3"></i>
                    <div>
                        <strong class="text-dark">{{ $insumos->nombre }}</strong>
                        <div class="small text-muted">Código: {{ $insumos->codigo }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('insumos.update', $insumos) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-tag me-2"></i> Información General
                </h6>
                @php
                    $cat = old('categoria', $insumos->categoria);
                @endphp
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Código (SKU) <span class="text-danger">*</span></label>
                        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $insumos->codigo) }}" required>
                        @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $insumos->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Categoría <span class="text-danger">*</span></label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="Fertilizantes" {{ $cat == 'Fertilizantes' ? 'selected' : '' }}>Fertilizantes</option>
                            <option value="Semillas Certificadas" {{ $cat == 'Semillas Certificadas' ? 'selected' : '' }}>Semillas Certificadas</option>
                            <option value="Agroquimicos" {{ $cat == 'Agroquimicos' ? 'selected' : '' }}>Agroquimicos</option>
                            <option value="Herramientas" {{ $cat == 'Herramientas' ? 'selected' : '' }}>Herramientas</option>
                            <option value="Sistemas de Riego" {{ $cat == 'Sistemas de Riego' ? 'selected' : '' }}>Sistemas de Riego</option>
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fabricante <span class="text-danger">*</span></label>
                        <input type="text" name="fabricante" class="form-control @error('fabricante') is-invalid @enderror" value="{{ old('fabricante', $insumos->fabricante) }}" required>
                        @error('fabricante')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-coins me-2"></i> Precios e Inventario
                </h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Precio <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" name="precio" step="0.01" min="0.01" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $insumos->precio) }}" required>
                        </div>
                        @error('precio')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Costo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" name="costo" step="0.01" min="0" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $insumos->costo) }}" required>
                        </div>
                        @error('costo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Inventario <span class="text-danger">*</span></label>
                        <input type="number" name="inventario" min="0" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario', $insumos->inventario) }}" required>
                        @error('inventario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Número de lote <span class="text-danger">*</span></label>
                        <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote', $insumos->numero_lote) }}" required>
                        @error('numero_lote')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-calendar-alt me-2"></i> Fechas y Fotografía
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de registro <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $insumos->fecha_registro) }}" required>
                        @error('fecha_registro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de vencimiento <span class="text-muted small">(opcional)</span></label>
                        <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento', $insumos->fecha_vencimiento) }}">
                        @error('fecha_vencimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Foto del empaque <span class="text-muted small">(jpg, png, webp, máx. 5MB)</span></label>
                        @if ($insumos->imagen)
                            <img src="{{ asset('uploads/insumos/' . $insumos->imagen) }}" alt="{{ $insumos->nombre }}" class="rounded mb-2 d-block" style="width: 80px;">
                            <div class="small text-muted mb-2">Deje el campo vacío para conservar la foto actual.</div>
                        @endif
                        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('insumos.index') }}" class="btn btn-outline-secondary">
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