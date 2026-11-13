@extends('layouts.admin')

@section('titulo', 'Catálogo de Insumos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 text-gray-800 mb-0">🌱 Insumos Agropecuarios e Inventario</h1>
        <small class="text-muted">Catálogo de insumos</small>
    </div>
    <a href="{{ route('insumos.create') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus me-1"></i> Nuevo Insumo
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Buscador --}}
<form action="{{ route('insumos.index') }}" method="GET" class="row g-2 mb-3">
    <div class="col-md-6">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o codigo..." value="{{ request('buscar') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-dark"><i class="fas fa-search me-1"></i> Buscar</button>
        @if (request('buscar'))
            <a href="{{ route('insumos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        @endif
    </div>
</form>

<div class="card shadow-sm mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">Foto</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th class="text-end">Precio</th>
                        <th class="text-center">Existencias</th>
                        <th class="text-center" style="width: 150px;">Acciones</th>
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
                        <td class="fw-bold">{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->categoria }}</td>
                        <td class="text-end">L. {{ number_format($insumo->precio, 2) }}</td>
                        <td class="text-center">
                            <strong>{{ $insumo->inventario }}</strong>
                            @if ($insumo->inventario > 20)
                                <span class="badge bg-success">Óptimo</span>
                            @elseif ($insumo->inventario >= 10)
                                <span class="badge bg-warning text-dark">Moderado</span>
                            @else
                                <span class="badge bg-danger">¡Desabastecimiento!</span>
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
                        <td colspan="7" class="text-center text-muted py-5">No hay insumos registrados.</td>
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
@endsection