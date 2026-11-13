<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        $query=Insumos::query();

        if($request->filled('buscar')){
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar){
                $q->where('nombre','like',"%{$buscar}%")
                ->orWhere('codigo','like',"%{$buscar}%");
            });
        
        }
        $insumos =$query->latest()->paginate(10)->withQueryString();

        return view ('insumos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'codigo' =>             'required|string|max:50|unique:insumos,codigo',
        'nombre'    =>          'required|string|max:255',
        'categoria' =>          'required|in:Fertilizantes,Semillas Certificadas,Agroquimicos,Herramientas,Sistemas de Riego',
        'precio'  =>            'required|numeric|gt:0',
        'costo'  =>             'required|numeric|min:0',
        'inventario' =>         'required|integer|min:0',
        'imagen' =>             'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'fabricante' =>         'required|string|max:255',
        'fecha_vencimiento' =>  'nullable|date',
        'fecha_registro' =>     'required|date',
        'numero_lote' =>        'required|string|max:50'   

        ]);
    $insumos=new Insumos($request->except('imagen'));
    
    if ($request->hasFile('imagen')){
        $insumos->imagen=$this->guardarImagen($request->file('imagen'));
    }

    $insumos->save();

    return redirect()
        ->route('insumos.index')
        ->with('success','Insumo añadido');
    }


    /**
     * Display the specified resource.
     */
    public function show(Insumos $insumos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumos $insumos)
    {
        return view ('insumos.edit',compact('insumos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumos $insumos)
    {
        $request->validate([
        'nombre'    =>          'required|string|max:255',
        'categoria' =>          'required|in:Fertilizantes,Semillas Certificadas,Agroquimicos,Herramientas,Sistemas de Riego',
        'precio'  =>            'required|numeric|gt:0',
        'costo'  =>             'required|numeric|min:0',
        'inventario' =>         'required|integer|min:0',
        'imagen' =>             'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'fabricante' =>         'required|string|max:255',
        'fecha_vencimiento' =>  'nullable|date',
        'fecha_registro' =>     'required|date',
        'numero_lote' =>        'required|string|max:50' 
        ]);

    
    $datos=$request->except('imagen');
    
    if ($request->hasFile('imagen')){
        $this->borrarImagen($insumos->imagen);
        $insumos->imagen=$this->guardarImagen($request->file('imagen'));
    }

         
    $insumos->update($datos);

    return redirect()
    ->route('insumos.index')
    ->with('success','Insumo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumos $insumos)
    {
        $this->borrarImagen($insumos->imagen);
        $insumos->delete(); 

        return redirect()
        ->route('insumos.index')
        ->with('success','Insumo eliminado');
    

    }

    private function guardarImagen($archivo): string{
       $nombre=time() . '_' . uniqid() . '.' . $archivo->guessExtension();
       $archivo->move(public_path('uploads/insumos'),$nombre);
       return $nombre; 
    }

    private function borrarImagen(?string $nombre):void{
        if ($nombre && file_exists(public_path('uploads/insumos/' . $nombre)))
            unlink(public_path('uploads/insumos/' . $nombre));
    }
}
