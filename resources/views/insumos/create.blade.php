@extends('layouts.admin')

@section('titulo', 'Nuevo Insumo')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-plus-circle text-success me-2"></i> Registrar Insumo
        </h1>
        <p class="text-muted mb-0">AgroValle | Alta de insumos agropecuarios</p>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-file-signature me-2"></i> Datos del Insumo
            </h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h6 class="text-success fw-bold mb-3">
                    <i class="fas fa-tag me-2"></i> Información General
                </h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Código (SKU) <span class="text-danger">*</span></label>
                        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}" required>
                        @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Categoría <span class="text-danger">*</span></label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="Fertilizantes" {{ old('categoria') == 'Fertilizantes' ? 'selected' : '' }}>Fertilizantes</option>
                            <option value="Semillas Certificadas" {{ old('categoria') == 'Semillas Certificadas' ? 'selected' : '' }}>Semillas Certificadas</option>
                            <option value="Agroquimicos" {{ old('categoria') == 'Agroquimicos' ? 'selected' : '' }}>Agroquimicos</option>
                            <option value="Herramientas" {{ old('categoria') == 'Herramientas' ? 'selected' : '' }}>Herramientas</option>
                            <option value="Sistemas de Riego" {{ old('categoria') == 'Sistemas de Riego' ? 'selected' : '' }}>Sistemas de Riego</option>
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fabricante <span class="text-danger">*</span></label>
                        <input type="text" name="fabricante" class="form-control @error('fabricante') is-invalid @enderror" value="{{ old('fabricante') }}" required>
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
                            <input type="number" name="precio" step="0.01" min="0.01" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" required>
                        </div>
                        @error('precio')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Costo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">L.</span>
                            <input type="number" name="costo" step="0.01" min="0" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo') }}" required>
                        </div>
                        @error('costo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Inventario <span class="text-danger">*</span></label>
                        <input type="number" name="inventario" min="0" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario') }}" required>
                        @error('inventario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Número de lote <span class="text-danger">*</span></label>
                        <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote') }}" required>
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
                        <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', date('Y-m-d')) }}" required>
                        @error('fecha_registro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de vencimiento <span class="text-muted small">(opcional)</span></label>
                        <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento') }}">
                        @error('fecha_vencimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Foto del empaque <span class="text-muted small">(jpg, png, webp, máx. 5MB)</span></label>
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
                        <i class="fas fa-save me-1"></i> Guardar Insumo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection