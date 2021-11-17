<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Descuento;
use App\Models\ItemDescuento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemDescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $itemsD = ItemDescuento::orderBy('id')->get();
        return view('itemDescuento.index', compact('itemsD'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('id_estado',1)->orderBy('id_item')->get();
        $descuentos = Descuento::where('id_estado',1)->orderBy('id_descuento')->get();
        return view('itemDescuento.create', compact('items','descuentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'id_descuento' => 'required',
            'id_item' => 'required',
        ]);

        $id_item= request ('id_item');
        $id_descuento=request ('id_descuento');
        $descuentos= Descuento::where('id_descuento',$id_descuento)->first();
        $items= Item::where('id_item',$id_item)->first();

        $valor= $descuentos->valor;
        $precioBase= $items->precio;

        $num= $precioBase*$valor;
        $precioNuevo= $precioBase-$num;
        

        try
        {
            DB::beginTransaction();
            $itemsD = new ItemDescuento();
            $itemsD-> id_item = request ('id_item');
            $itemsD-> id_descuento = request ('id_descuento');
            $itemsD-> precio_nuevo = $precioNuevo;
            $itemsD-> id_estado =1;
            DB::Commit();
            $itemsD->save();
            return redirect()->back()->with(['message' => 'El descuento fue aplicado con exito', 'alert' => 'alert-success']);
        }
        catch(\Exception $e)
        {
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
          // return redirect()->back()->with(['message' => 'ERROR. Intente cambiar Codigo', 'alert' => 'alert-danger']);
        }
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
        //
    }
}
