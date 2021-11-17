<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicidad;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PublicidadController extends Controller
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

        $publicidades = Publicidad::where('id_estado','1')->orderBy('id_publicidad')->get();
        return view('publicidad.index', compact('publicidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicidad.create');
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
            'descripcion' => 'required',
        ]);

        try
        {
            
            $imagen = $request->file('img');
            $nombre = $imagen->getClientOriginalName();
            $random = Str::random(15);
            $nombre = "$random$nombre";
            $path = $request->file('img')->storeAs(
                'publicidad',
                $nombre,
                'public'
            );
            $url = "/storage/app/public/publicidad/$nombre";

            $publicidades = new Publicidad();
            $publicidades-> descripcion = request ('descripcion');
            $publicidades-> ruta_imagen = $url;
            $publicidades-> id_estado =1;
            DB::Commit();
            $publicidades->save();
            return redirect()->back()->with(['message' => 'La Publicidad fue creada con exito', 'alert' => 'alert-success']);
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
