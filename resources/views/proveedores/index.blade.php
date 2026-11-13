@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-dark fw-bold mb-1">
                <i class="fas fa-industry text-success me-2"></i> Fabricantes y Proveedores Agricolas
            </h1>
            <p class="text-muted mb-0">AgroValle | Control de proveedores</p>
        </div>
        <a href="{{ route('proveedores.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-1"></i> Nuevo Proveedor
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-list me-2"></i> Listado de Proveedores
            </h6>
            <small>{{ $proveedores->total() }} registros</small>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
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
                            <th class="text-center" style="width: 130px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $proveedor)
                        <tr>
                            <td class="text-center text-muted fw-bold">{{ $proveedor->id }}</td>
                            <td><code>{{ $proveedor->rtn }}</code></td>
                            <td class="fw-semibold">{{ $proveedor->empresa }}</td>
                            <td>{{ $proveedor->contacto }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->categoria }}</td>
                            <td class="text-end">L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                            <td class="text-center">
                                <span class="badge bg-info text-dark">{{ $proveedor->dias_credito }} dias</span>
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
                            <td colspan="10" class="text-center text-muted py-5">
                                <i class="fas fa-industry fa-3x mb-3 text-secondary d-block"></i>
                                No hay proveedores registrados.
                            </td>
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
</div>
@endsection