@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 text-dark fw-bold mb-1">
            <i class="fas fa-chart-line text-success me-2"></i> Dashboard Gerencial
        </h1>
        <p class="text-muted mb-0">AgroValle | Indicadores clave del sistema</p>
    </div>

    <h6 class="text-success fw-bold mb-3">
        <i class="fas fa-chart-pie me-2"></i> Indicadores Clave
    </h6>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase small fw-semibold text-muted">Insumos en Catálogo</div>
                            <div class="h3 fw-bold mb-0 mt-1">{{ $totalInsumos }}</div>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="fas fa-boxes-stacked fa-lg"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('insumos.index') }}" class="card-footer bg-transparent border-0 small text-success text-decoration-none px-4 pb-3">
                    Ver detalle <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase small fw-semibold text-muted">Proveedores Activos</div>
                            <div class="h3 fw-bold mb-0 mt-1">{{ $proveedoresActivos }}</div>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="fas fa-industry fa-lg"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('proveedores.index') }}" class="card-footer bg-transparent border-0 small text-primary text-decoration-none px-4 pb-3">
                    Ver detalle <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase small fw-semibold text-muted">Empleados en Nómina</div>
                            <div class="h3 fw-bold mb-0 mt-1">{{ $totalEmpleados }}</div>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('empleados.index') }}" class="card-footer bg-transparent border-0 small text-warning text-decoration-none px-4 pb-3">
                    Ver detalle <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase small fw-semibold text-muted">Valor del Inventario</div>
                            <div class="h3 fw-bold mb-0 mt-1">L. {{ number_format($valorInventario, 2) }}</div>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="fas fa-coins fa-lg"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('insumos.index') }}" class="card-footer bg-transparent border-0 small text-danger text-decoration-none px-4 pb-3">
                    Ver detalle <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection