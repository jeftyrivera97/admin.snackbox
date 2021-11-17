<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Combo;
use App\Models\Producto;
use App\Models\ComboDetalle;

class ComboDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function detalles($id_combo)
    {
        $combo = Combo::where('id_combo',$id_combo)->first();
        $productos = Producto::where('id_estado',1)->orderBy('id_producto')->get();
        $detalles = ComboDetalle::where('id_combo',$id_combo)->get();

        return view('combo.detalle', compact('combo','productos','detalles'));
    }

    public function guardar($id_combo)
    {
        $id_combo=request ('id_combo');

        $detalles = new ComboDetalle();
        $detalles-> id_combo = request ('id_combo');
        $detalles-> id_producto = request ('id_producto');
        $detalles-> cantidad =request ('cantidad');
        $detalles->save();
        DB::Commit();
        
        $combo = Combo::where('id_combo',$id_combo)->first();
        $productos = Producto::where('id_estado',1)->orderBy('id_producto')->get();
        $detalles = ComboDetalle::where('id_combo',$id_combo)->get();

        return redirect()->route('combo-detalle', ['id_combo' => $id_combo]);
     
       
    }

    public function eliminar($id_combo)
    {
        $id_combo=request ('id_combo');

        $detalles = new ComboDetalle();
        $detalles-> id_combo = request ('id_combo');
        $detalles-> id_producto = request ('id_producto');
        $detalles-> cantidad =request ('cantidad');
        $detalles->save();
        DB::Commit();
        
        $combo = Combo::where('id_combo',$id_combo)->first();
        $productos = Producto::where('id_estado',1)->orderBy('id_producto')->get();
        $detalles = ComboDetalle::where('id_combo',$id_combo)->get();

        return redirect()->route('combo-detalle', ['id_combo' => $id_combo]);
     
       
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalles = comboDetalle::find($id);
        $detalles->delete();
        return back();
    }
}
