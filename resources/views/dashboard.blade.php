@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<div class="mb-4">
    <h1 class="h3 text-gray-800 mb-0">📊 Dashboard Gerencial</h1>
    <small class="text-muted">Agropecuaria Agrovalle - Indicadores clave</small>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small fw-bold text-primary">Insumos en Catálogo</div>
                        <div class="h3 mb-0 fw-bold">{{ $totalInsumos }}</div>
                    </div>
                    <i class="fas fa-boxes-stacked fa-2x text-secondary"></i>
                </div>
            </div>
            <a href="{{ route('insumos.index') }}" class="card-footer small text-decoration-none">Ver detalle →</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm border-start border-success border-4 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small fw-bold text-success">Proveedores Activos</div>
                        <div class="h3 mb-0 fw-bold">{{ $proveedoresActivos }}</div>
                    </div>
                    <i class="fas fa-industry fa-2x text-secondary"></i>
                </div>
            </div>
            <a href="{{ route('proveedores.index') }}" class="card-footer small text-decoration-none">Ver detalle →</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm border-start border-warning border-4 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small fw-bold text-warning">Empleados en Nómina</div>
                        <div class="h3 mb-0 fw-bold">{{ $totalEmpleados }}</div>
                    </div>
                    <i class="fas fa-users fa-2x text-secondary"></i>
                </div>
            </div>
            <a href="{{ route('empleados.index') }}" class="card-footer small text-decoration-none">Ver detalle →</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm border-start border-danger border-4 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small fw-bold text-danger">Valor del Inventario</div>
                        <div class="h3 mb-0 fw-bold">L. {{ number_format($valorInventario, 2) }}</div>
                    </div>
                    <i class="fas fa-coins fa-2x text-secondary"></i>
                </div>
            </div>
            <a href="{{ route('insumos.index') }}" class="card-footer small text-decoration-none">Ver detalle →</a>
        </div>
    </div>
</div>
@endsection