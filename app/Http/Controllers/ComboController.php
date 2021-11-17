<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Combo;
use App\Models\TipoCategoria;
use App\Models\ComboCategoria;
use App\Models\Categoria;
use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combos = Combo::where('id_estado',1)->orderBy('id_combo')->get();
      
       
        
        $tendencia = ComboCategoria::where('id_categoria',1)->get();
        $popular= ComboCategoria::where('id_categoria',2)->get();
        
        $tendencias=count($tendencia);
        $populares=count($popular);

        return view('combo.index', compact('combos','tendencias','populares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_Categorias = TipoCategoria::where('descripcion','Combos')->first();
        $id_tipo=$tipo_Categorias->id_tipo;
        $categorias=Categoria::where('id_tipo',$id_tipo)->get();
        return view('combo.create', compact('categorias'));
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
                'combos',
                $nombre,
                'public'
            );
            $url = "/storage/app/public/combos/$nombre";
            
            
           /*
            $destino= public_path('img\\combo');
            $request->img->move($destino,$nombre);
            $carpeta= "combo";
            $public_path = public_path();
            $url = "$carpeta$nombre";*/

            $items = new Item();
            $items-> titulo = request ('titulo');
            $items-> precio = request ('precio');
            $items-> ruta_imagen =$url;
            $items-> id_tipo =1;
            $items-> id_estado =1;
            DB::Commit();
            $items->save();
            $idt=$items->id_item;
                    
        
            $combos = new Combo();
            $combos-> titulo = request ('titulo');
            $combos-> descripcion = request ('descripcion');
            $combos-> precio = request ('precio');
            $combos-> id_estado = 1;
            $combos-> tag = request ('tag');
            $combos-> ruta_imagen = $url;
            $combos-> id_item = $idt;
            DB::Commit();
            $combos->save();
            $id_combo= $combos->id_combo;

            $categorias=Categoria::where('id_tipo',1)->get();
            $contador= count($categorias);

            if($combos->save())
            {

                try{

                    for($i=0; $i<$contador; $i++)
                    {
                        $id= $categorias[$i]->id_categoria;
                        $desc= $categorias[$i]->descripcion;
                    
                        if($request->has($desc)){
                        $combosCategorias = new ComboCategoria();
                        $combosCategorias-> id_categoria =  $id;
                        $combosCategorias-> id_combo = $id_combo;
                        DB::Commit();
                        $combosCategorias->save();
                        }
                    }

                    return redirect()->route('combo-detalle', ['id_combo' => $id_combo])->with(['message' => 'El combo fue creada con exito! Ahora proceda añadir el contenido.', 'alert' => 'alert-success']);
                    //return redirect()->back()->
                
                }catch(\Exception $e){
                    DB::Rollback();
                    echo 'Error: ' .$e->getMessage();
                }

            }
            

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
    public function edit($id_combo)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        return view('combo.edit', ['combos' => Combo::findOrFail($id_combo)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_combo)
    {
        try
        {
            $encontrado= Combo::where('id_combo',$id_combo)->first();
            $id_item= $encontrado->id_item;

            DB::beginTransaction();
            $combos = Combo::find($id_combo);
            $combos-> titulo = request ('titulo');
            $combos-> descripcion = request ('descripcion');
            $combos-> precio = request ('precio');
            $combos-> tag = request ('tag');
            $combos->update();
            DB::commit();

            if($combos->update())
            {
                DB::beginTransaction();
                $items= Item::find($id_item);
                $items-> titulo = request ('titulo');
                $items-> precio = request ('precio');
                $items->update();
                DB::commit();
    
                return redirect()->back()->with(['message' => 'El Combo ha sido actualizado con exito!', 'alert' => 'alert-success']);
            }
         
        }

        catch(\Exception $e)
        {
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
          // return redirect()->back()->with(['message' => 'ERROR. Intente cambiar Codigo', 'alert' => 'alert-danger']);
        }
    }

    public function desactivar($id_combo)
    {
        try
        {
            DB::beginTransaction();
            $combos = Combo::find($id_combo);
            $combos-> id_estado = 2;
            $combos->update();
            
            
            $encontrados= ComboCategoria::where('id_combo',$id_combo)->get();

            foreach($encontrados as $encontrado)
            {
                
                $id=$encontrado->id;
                $combo=ComboCategoria::find($id);
                $combo->delete();
            
            }

            $c= Combo::where('id_combo',$id_combo)->first();
            $id_item= $c->id_item;
            
            $items= Item::find($id_item);
            $items-> id_estado= 2;
            $items->update();
            DB::commit();


            return redirect()->back()->with(['message' => 'El Combo ha sido eliminado con exito!', 'alert' => 'alert-warning']);
        }

        catch(\Exception $e)
        {
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
          // return redirect()->back()->with(['message' => 'ERROR. Intente cambiar Codigo', 'alert' => 'alert-danger']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_combo)
    {
       
    }
}
