<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados =Empleados::latest()->paginate(10);

        return view('empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'identidad'     => 'required|digits:13|unique:empleados,identidad',
        'nombre'        => 'required|string|max:255',
        'apellido'      => 'required|string|max:255',
        'correo'        => 'required|email|max:255',
        'cargo'         => 'required|in:Ingeniero Agronomo,Asesor Tecnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
        'salario'       => 'required|numeric|gt:0',
        'estado'        => 'required|in:1,0',
        'fecha_ingreso' => 'required|date',
        ]);

        Empleados::create($request->all());

        return redirect()
            ->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleados)
    {
        return view('empleados.edit',compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleados)
    {
    $request->validate([
        'identidad'     => 'required|digits:13|unique:empleados,identidad,' . $empleados->id,
        'nombre'        => 'required|string|max:255',
        'apellido'      => 'required|string|max:255',
        'correo'        => 'required|email|max:255',
        'cargo'         => 'required|in:Ingeniero Agronomo,Asesor Tecnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
        'salario'       => 'required|numeric|gt:0',
        'estado'        => 'required|in:1,0',
        'fecha_ingreso' => 'required|date',
        ]);

        $empleados->update($request->all());

        return redirect()
            ->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleados)
    {
        $empleados->delete();

        return redirect()
            ->route('empleados.index')
            ->with('success', '¡Empleado registrado exitosamente!');
    }
}
