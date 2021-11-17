<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
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

        $ciudades = Ciudad::orderBy('id')->get();
        return view('ciudad.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciudad.create');
    }

    public function desactivar($id)
    {
        DB::beginTransaction();

        try {

            $ciudades = Ciudad::find($id);
            $ciudades->id_estado = 2;
            $ciudades->update();
            DB::commit();

            return redirect()->back()->with(['message' => 'La Cuidad fue descativada con exito', 'alert' => 'alert-danger']);
        
        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
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
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'ciudad' => 'required',
            'departamento' => 'required',
        ]);

        try
        {
            DB::beginTransaction();
            $ciudades = new Ciudad();
            $ciudades-> ciudad = request ('ciudad');
            $ciudades-> departamento = request ('departamento');
            $ciudades-> id_estado =1;
            DB::Commit();
            $ciudades->save();
            return redirect()->back()->with(['message' => 'La Ciudad de Entrega fue guardada con exito', 'alert' => 'alert-success']);
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
