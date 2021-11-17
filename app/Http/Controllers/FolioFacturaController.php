<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FolioFactura;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FolioFacturaController extends Controller
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

        $folios = FolioFactura::all();
        return view('folio.index', compact('folios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {

        if (FolioFactura::where('id_estado',1)->exists()) {
            return redirect()->back()->with(['message' => 'Ya existe un Folio Activo!', 'alert' => 'alert-danger']);
        }else{

            $clave= request('clave');

            if($clave=="123")
            {
                return view('folio.create');
            }
            else
            {
                return redirect('folio')->with(['message' => 'Clave Incorrecta!', 'alert' => 'alert-danger']);
            }
          
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {

            DB::beginTransaction();
            $folios = new FolioFactura();
            $folios-> inicio = request ('inicio');
            $folios-> final = request ('final');
            $folios-> fecha_inicial = request ('fecha_inicial');
            $folios-> fecha_final = request ('fecha_final');
            $folios-> contador =request ('inicio');
            $folios-> id_estado = 1;
            DB::Commit();
            $folios->save();

            return redirect('folio')->with(['message' => 'Folio activado con exito!', 'alert' => 'alert-success']);
         
            

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
    public function desactivar($id_folio)
    {
        DB::beginTransaction();

        try {

            $folios = FolioFactura::find($id_folio);
            $folios->id_estado = 2;
            $folios->update();
            DB::commit();

            return redirect()->back()->with(['message' => 'El Folio fue desactivado con exito', 'alert' => 'alert-danger']);
        
        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
        }
    }
}
