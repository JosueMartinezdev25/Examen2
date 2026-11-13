@extends('layouts.admin')

@section('titulo', 'Catálogo de Insumos')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-dark fw-bold mb-1">
                <i class="fas fa-boxes-stacked text-success me-2"></i> Catálogo de Insumos
            </h1>
            <p class="text-muted mb-0">AgroValle | Insumos agropecuarios e inventario</p>
        </div>
        <a href="{{ route('insumos.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-1"></i> Nuevo Insumo
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-list me-2"></i> Listado de Insumos
            </h6>
            <small>{{ $insumos->total() }} registros</small>
        </div>
        <div class="card-body p-4">

            <form action="{{ route('insumos.index') }}" method="GET" class="row g-2 mb-4">
                <div class="col-md-6">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o código (SKU)..." value="{{ request('buscar') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-search me-1"></i> Buscar
                    </button>
                    @if (request('buscar'))
                        <a href="{{ route('insumos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Foto</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th class="text-end">Precio</th>
                            <th class="text-center">Existencias</th>
                            <th class="text-center" style="width: 130px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($insumos as $insumo)
                        <tr>
                            <td class="text-center">
                                @if ($insumo->imagen)
                                    <img src="{{ asset('uploads/insumos/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}"
                                         class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <i class="fas fa-image fa-2x text-secondary"></i>
                                @endif
                            </td>
                            <td><code>{{ $insumo->codigo }}</code></td>
                            <td class="fw-semibold">{{ $insumo->nombre }}</td>
                            <td>{{ $insumo->categoria }}</td>
                            <td class="text-end">L. {{ number_format($insumo->precio, 2) }}</td>
                            <td class="text-center">
                                <strong>{{ $insumo->inventario }}</strong>
                                @if ($insumo->inventario > 20)
                                    <span class="badge bg-success">Óptimo</span>
                                @elseif ($insumo->inventario >= 10)
                                    <span class="badge bg-warning text-dark">Moderado</span>
                                @else
                                    <span class="badge bg-danger">Desabastecimiento</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Seguro que desea eliminar este insumo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="fas fa-box-open fa-3x mb-3 text-secondary d-block"></i>
                                No hay insumos registrados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $insumos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection