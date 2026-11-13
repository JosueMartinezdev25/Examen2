@extends('layouts.admin')

@section('titulo', 'Nomina y Personal')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h1 class="h3 text-dark fw-bold mb-1">
                <i class="fas fa-users text-success me-2"></i> Recursos Humanos
            </h1>
            <p class="text-muted mb-0">AgroValle | Control de Nomina y Personal</p>
        </div>
        <a href="{{ route('empleados.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-user-plus me-1"></i> Contratar Empleado
        </a>
    </div>
    <div class="card shadow-sm border-0 rounded-3 mb-4">
        <div class="card-header bg-success text-white py-3 border-0">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-id-card me-2"></i> Personal de la Empresa
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">ID</th>
                            <th>DNI</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th class="text-end">Salario Mensual</th>
                            <th class="text-center">Fecha Ingreso</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($empleados as $empleado)
                            <tr>
                                <td class="text-center text-muted fw-semibold">{{ $empleado->id }}</td>
                                <td><code>{{ $empleado->identidad }}</code></td>
                                <td class="fw-semibold text-dark">{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                                <td>{{ $empleado->correo }}</td>
                                <td>
                                    @if ($empleado->cargo == 'Ingeniero Agronomo' || $empleado->cargo == 'Ingeniero Agrónomo')
                                        <span class="badge bg-success">{{ $empleado->cargo }}</span>
                                    @elseif ($empleado->cargo == 'Asesor Tecnico de Campo' || $empleado->cargo == 'Asesor Técnico de Campo')
                                        <span class="badge bg-primary">{{ $empleado->cargo }}</span>
                                    @elseif ($empleado->cargo == 'Jefe de Bodega Central')
                                        <span class="badge bg-warning text-dark">{{ $empleado->cargo }}</span>
                                    @elseif ($empleado->cargo == 'Operador de Maquinaria')
                                        <span class="badge bg-dark">{{ $empleado->cargo }}</span>
                                    @elseif ($empleado->cargo == 'Cajero')
                                        <span class="badge bg-info text-dark">{{ $empleado->cargo }}</span>
                                    @else
                                        <span class="badge bg-light text-dark border">{{ $empleado->cargo }}</span>
                                    @endif
                                </td>
                                <td class="text-end fw-bold text-success">L. {{ number_format($empleado->salario, 2) }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($empleado->fecha_ingreso)) }}</td>
                                <td class="text-center">
                                    @if ($empleado->estado == 1)
                                        <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Activo</span>
                                    @else
                                        <span class="badge bg-secondary"><i class="fas fa-ban me-1"></i> Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm" title="Editar Expediente">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" onsubmit="return confirm('Confirma que desea retirar a este empleado de la nomina?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Dar de Baja">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="fas fa-users-slash fa-3x text-muted mb-3 d-block"></i>
                                    <h6 class="text-dark fw-bold">No hay empleados registrados</h6>
                                    <p class="text-muted mb-3">Todavia no se ha agregado personal a la empresa.</p>
                                    <a href="{{ route('empleados.create') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-user-plus me-1"></i> Contratar Empleado
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $empleados->links() }}
            </div>
        </div>
    </div>
</div>
@endsection