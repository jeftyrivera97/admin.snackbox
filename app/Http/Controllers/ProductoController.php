<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\TipoCategoria;
use App\Models\ProductoCategoria;
use App\Models\Categoria;
use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
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
      
        $productos = Producto::where('id_estado','1')->orderBy('id_producto')->get();
     
      
        return view('producto.index', compact('productos'));
    }

    
    public function buscar(Request $request)
    {
        $codigo_producto= request('busqueda');

        $existe= DB::table('productos')->where('codigo_producto', $codigo_producto)->exists();
        if($existe==true)
        {
            $productos = Producto::where('codigo_producto',$codigo_producto)->first();
            return view('producto.busqueda', compact('productos'));
            
            
        }else{
            return view ('producto.noFind');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_Categorias = TipoCategoria::where('descripcion','Productos')->first();
        $id_tipo=$tipo_Categorias->id_tipo;
        $categorias=Categoria::where('id_tipo',$id_tipo)->get();
        return view('producto.create', compact('categorias'));
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
                'productos',
                $nombre,
                'public'
            );
            $url = "/storage/app/public/productos/$nombre";

            $items = new Item();
            $items-> titulo = request ('titulo');
            $items-> precio = request ('precio');
            $items-> ruta_imagen =$url;
            $items-> id_tipo =2;
            $items-> id_estado =1;
            DB::Commit();
            $items->save();
            $idt=$items->id_item;
                    
        
            $productos = new Producto();
            $productos-> titulo = request ('titulo');
            $productos-> descripcion = request ('descripcion');
            $productos-> codigo_producto = request ('codigo_producto');
            $productos-> precio = request ('precio');
            $productos-> id_estado = 1;
            $productos-> ruta_imagen = $url;
            $productos-> id_item = $idt;
            DB::Commit();
            $productos->save();
            $id_producto= $productos->id_producto;

            $categorias=Categoria::where('id_tipo',2)->get();
            $contador= count($categorias);

            if($productos->save())
            {

                try{

                    for($i=0; $i<$contador; $i++)
                    {
                        $id= $categorias[$i]->id_categoria;
                        $desc= $categorias[$i]->descripcion;
                    
                        if($request->has($desc)){
                        $productoCategorias = new ProductoCategoria();
                        $productoCategorias-> id_categoria =  $id;
                        $productoCategorias-> id_producto = $id_producto;
                        DB::Commit();
                        $productoCategorias->save();
                        }
                    }

                    return redirect()->back()->with(['message' => 'El Producto fue creada con exito', 'alert' => 'alert-success']);
                
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
    public function show($codigo_producto)
    {
        $productos = Producto::where('codigo_producto',$codigo_producto)->first();
        return view('producto.show', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        return view('producto.edit', ['productos' => Producto::findOrFail($id_producto)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        try
        {
            $encontrado= Producto::where('id_producto',$id_producto)->first();
            $id_item= $encontrado->id_item;

            DB::beginTransaction();
            $productos = Producto::find($id_producto);
            $productos-> titulo = request ('titulo');
            $productos-> descripcion = request ('descripcion');
            $productos-> precio = request ('precio');
            $productos->update();
            DB::commit();

            if($productos->update())
            {
                DB::beginTransaction();
                $items= Item::find($id_item);
                $items-> titulo = request ('titulo');
                $items-> precio = request ('precio');
                $items->update();
                DB::commit();
    
                return redirect()->back()->with(['message' => 'El Producto ha sido actualizado con exito!', 'alert' => 'alert-success']);
            }

           
        }

        catch(\Exception $e)
        {
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
          // return redirect()->back()->with(['message' => 'ERROR. Intente cambiar Codigo', 'alert' => 'alert-danger']);
        }
    }

    public function desactivar($id_producto)
    {
        try
        {
            DB::beginTransaction();
            $productos = Producto::find($id_producto);
            $productos-> id_estado = 2;
            $productos->update();
            
            
            $encontrados= ProductoCategoria::where('id_producto',$id_producto)->get();

            foreach($encontrados as $encontrado)
            {
                $id=$encontrado->id;
                $producto=ProductoCategoria::find($id);
                $producto->delete();
            
            }

            $p= Producto::where('id_producto',$id_producto)->first();
            $id_item= $p->id_item;

            $items= Item::find($id_item);
            $items-> id_estado= 2;
            $items->update();
            DB::commit();


            return redirect()->back()->with(['message' => 'El Producto ha sido eliminado con exito!', 'alert' => 'alert-warning']);
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
    public function destroy($id)
    {
        //
    }
}
