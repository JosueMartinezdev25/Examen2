<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedores::latest()->paginate(10);

        return view('proveedores.index',compact('proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedores::latest()->paginate(10);

        return view('proveedores.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'rtn'            => 'required|digits:14|unique:proveedores,rtn',
        'empresa'        => 'required|string|max:255',
        'contacto'       => 'required|string|max:255',
        'telefono'       => 'required|digits:8',
        'categoria'      => 'required|in:Quimicos,Semilleros,Maquinaria',
        'limite_credito' => 'required|numeric|min:0',
        'dias_credito'   => 'required|in:15,30,45,60',
        'estado'         => 'required|in:1,0',
        'fecha_registro' => 'required|date',
        ]);
        Proveedores::create($request->all());

         return redirect()
        ->route('proveedores.index')
        ->with('success','Proveedor añadido');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedores $proveedores)
    {
        return view ('proveedores.edit',compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedores $proveedores)
    {
        $request->validate([
        'rtn'            => 'required|digits:14|unique:proveedores,rtn,' . $proveedores->id,
        'empresa'        => 'required|string|max:255',
        'contacto'       => 'required|string|max:255',
        'telefono'       => 'required|digits:8',
        'categoria'      => 'required|in:Quimicos,Semilleros,Maquinaria',
        'limite_credito' => 'required|numeric|min:0',
        'dias_credito'   => 'required|in:15,30,45,60',
        'estado'         => 'required|in:1,0',
        'fecha_registro' => 'required|date',
        ]);

        $proveedores->update($request->all());

        return redirect()
        ->route('proveedores.index')
        ->with('success','Proveedor actualizado');

        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedores $proveedores)
    {
        $proveedores->delete();

        
         return redirect()
        ->route('proveedores.index')
        ->with('success','Proveedor eliminado');
    }
}
