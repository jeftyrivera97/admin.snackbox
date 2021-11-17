<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaBancaria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CuentaBancariaController extends Controller
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

        $cuentas = CuentaBancaria::all();
        return view('cuenta.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuenta.create');
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
            'codigo_cuenta' => 'required',
            'banco' => 'required',
            'titular' => 'required',
        ]);

        try
        {
            DB::beginTransaction();
            $cuentas = new CuentaBancaria();
            $cuentas-> codigo_cuenta = request ('codigo_cuenta');
            $cuentas-> banco = request ('banco');
            $cuentas-> titular = request ('titular');
            $cuentas-> id_estado =1;
            DB::Commit();
            $cuentas->save();
            return redirect()->back()->with(['message' => 'La Cuenta fue guardada con exito', 'alert' => 'alert-success']);
        }
        catch(\Exception $e)
        {
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
          // return redirect()->back()->with(['message' => 'ERROR. Intente cambiar Codigo', 'alert' => 'alert-danger']);
        }
    }

    public function desactivar($id_cuenta)
    {
        DB::beginTransaction();

        try {

            $cuentas = CuentaBancaria::find($id_cuenta);
            $cuentas->id_estado = 2;
            $cuentas->update();
            DB::commit();

            return redirect()->back()->with(['message' => 'La Cuenta Bancaria fue desactivado con exito', 'alert' => 'alert-danger']);
        
        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
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
