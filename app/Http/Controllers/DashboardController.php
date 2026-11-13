<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\Proveedores;
use App\Models\Empleados;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInsumos       = Insumos::count();
        $proveedoresActivos = Proveedores::where('estado', 1)->count();
        $totalEmpleados     = Empleados::count();
        $valorInventario    = Insumos::sum(DB::raw('inventario * precio'));

        return view('dashboard', compact(
            'totalInsumos',
            'proveedoresActivos',
            'totalEmpleados',
            'valorInventario'
        ));
    }
}