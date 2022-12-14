<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categoria')->paginate(8);
        return view('almacen.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre'); 
        $categoria->descripcion = $request->input('descripcion'); 
        $categoria->condicion = 1;

        $categoria->save();

        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('almacen.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->condicion = 1;
        $categoria->save();

        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index');
    }

    public function imprimir(){
        $categorias = DB::table('categoria')->get();

        $pdf = PDF::loadView('reportepdf', compact('categorias'));
        return $pdf->download('reporte.pdf');
   }

   public function graficosbarras(){
    $categorias = DB::table('categoria')->get();
    $puntos = [];
    foreach ($categorias as $categoria) {
        $puntos[] = ['name'=> $categoria->nombre, 'y'=>$categoria->condicion];
    }
    // retorna una vista desde la carpeta de vistas
    return view('almacen.categoria.graficosbarras', ["data"=>json_encode($puntos)]);
    // return $puntos;
   }

   public function graficostortas(){
    $categorias = DB::table('categoria')->get();
    $puntos = [];
    foreach ($categorias as $categoria) {
        $puntos[] = ['name'=> $categoria->nombre, 'y'=>$categoria->condicion];
    }
    return view('almacen.categoria.graficostortas', ["data"=>json_encode($puntos)]);
    // return $puntos;
   }

}
