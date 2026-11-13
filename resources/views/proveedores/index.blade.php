@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 text-gray-800 mb-0">🏭 Fabricantes y Proveedores Agricolas</h1>
    </div>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus me-1"></i> Nuevo Proveedor
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Categoria</th>
                        <th class="text-end">Limite de credito</th>
                        <th class="text-center">Plazo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $proveedor->id }}</td>
                        <td><code>{{ $proveedor->rtn }}</code></td>
                        <td class="fw-bold">{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->contacto }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->categoria }}</td>
                        <td class="text-end">L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                        <td class="text-center">
                            <span class="badge bg-info text-dark">{{ $proveedor->dias_credito }} días</span>
                        </td>
                        <td class="text-center">
                            @if ($proveedor->estado == '1')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm me-1" title="Editar">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Seguro que desea eliminar este proveedor?')">
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
                        <td colspan="10" class="text-center text-muted py-5">No hay proveedores registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $proveedores->links() }}
        </div>
    </div>
</div>
@endsection