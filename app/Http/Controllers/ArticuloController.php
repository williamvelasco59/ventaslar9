<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = DB::table('articulo as a')
        ->join('categoria as c', 'c.idcategoria', '=', 'a.idcategoria')
        ->select('a.idarticulo','a.codigo', 'a.nombre', 'a.stock', 'a.descripcion', 'a.imagen', 'a.estado', 'c.nombre as categoria', 'c.descripcion as catdescripcion', 'c.condicion', 'c.idcategoria')->get();

        // $articulos = DB::table('articulo')->get();
        return view('almacen.articulo.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categoria')->get();
        return view('almacen.articulo.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulo();
        $articulo->idcategoria = $request->input('idcategoria');
        $articulo->codigo = $request->input('codigo');
        $articulo->nombre = $request->input('nombre');
        $articulo->estado = $request->input('estado');
        $articulo->stock = $request->input('stock');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->imagen = $request->input('imagen');
        $articulo->save();

        return redirect()->route('articulo.index');
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
        $articulo = Articulo::findOrFail($id);
        $categorias = DB::table('categoria')->get();
        return view('almacen.articulo.edit', ["articulo"=>$articulo, "categorias"=>$categorias]);
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
        $articulo = Articulo::findOrFail($id);
        $articulo->idcategoria = $request->input('idcategoria');
        $articulo->codigo = $request->input('codigo');
        $articulo->nombre = $request->input('nombre');
        $articulo->estado = $request->input('estado');
        $articulo->stock = $request->input('stock');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->imagen = $request->input('imagen');
        $articulo->save();

        return redirect()->route('articulo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();

        return redirect()->route('articulo.index');
    }

    public function imprimir(){
        $articulos = DB::table('articulo')->get();

        $pdf = PDF::loadView('almacen.articulo.reportearti', compact('articulos'));
        return $pdf->download('reportearticulos.pdf');
    }

    public function graficosbarras(){
        $articulos = DB::table('articulo')->get();
        $puntos = [];
        foreach ($articulos as $articulo) {
            $puntos[] = ['name'=>$articulo->nombre, 'y'=>$articulo->stock];

        }
        return view('almacen.articulo.graficobarras', ["data"=>json_encode($puntos)]);
    }

    public function graficotorta(){
        $articulos = DB::table('articulo')->get();
        $puntos = [];
        foreach ($articulos as $articulo) {
            $puntos[] = ["name"=>$articulo->nombre, "y"=>$articulo->stock];
        }

        return view('almacen.articulo.graficotorta', ["data"=>json_encode($puntos)]);
    }
}
