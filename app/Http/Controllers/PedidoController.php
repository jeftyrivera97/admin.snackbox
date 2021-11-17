<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChangeEvent;
use App\Events\PedidoEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\PedidoDeposito;
use App\Models\CuentaBancaria;
use App\Models\PedidoDetalle;
use App\Models\Venta;
use App\Models\VentaCredito;
use App\Models\FolioFactura;
use App\Models\Factura;
use App\Http\Requests\UserFormRequest;
use App\Models\Cliente;
use App\Models\User;
use App\Notifications\NewMessage;
use App\Notifications\PedidoNotification;
use Illuminate\Support\Facades\Auth;
use Luecano\NumeroALetras\NumeroALetras;


class PedidoController extends Controller
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
        $pedidos = Pedido::all();
        return view('pedido.index',compact('pedidos'));
    }
    public function cancelados()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $pedidos = Pedido::where('id_estado',5)->get();
        $totalCancelados= count($pedidos);
        return view('pedido.cancelados',compact('pedidos','totalCancelados'));
    }

    public function buscar(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 

        $codigo_pedido= request('busqueda');

        if(Pedido::where('codigo_pedido', $codigo_pedido)->exists())
        {
            
            $pedidos = Pedido::where('codigo_pedido',$codigo_pedido)->first();
            $id_pedido= $pedidos->id_pedido;
            $detalles = PedidoDetalle::where('id_pedido',$id_pedido)->get();
            $ventas= Venta::where('id_pedido',$id_pedido)->first();
    
            $depositos= PedidoDeposito::where('id_pedido',$id_pedido)->first();
            return view('busqueda.encontrado', compact('pedidos','depositos','ventas','detalles'));
            
            
        }else{
            return view ('busqueda.noEncontrado');
        }
    }



    public function leerNotificaciones()
    {
        $id = Auth::id();
        $cliente = Cliente::where('id_usuario',$id)->first();
        
        $pedidoNotificaciones = Auth::user()->unreadNotifications;
        return view('notificaciones.index', compact('pedidoNotificaciones','cliente'));
    }

    public function leyendoNotificaciones(Request $request)
    {

        Auth::user()->unreadNotifications
                    ->when($request->input('id'), function($query) use ($request){
                        return $query->where('id', $request->input('id'));
                    })->markAsRead();

                    return response()->noContent();
    }

    public function pendienteIndex()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $pedidos = Pedido::where('id_estado',1)->get();
        $total= count($pedidos);
        return view('pedido.confirmar',compact('pedidos','total'));
    }

    public function procesoIndex()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $pedidos = Pedido::where('id_estado',2)->get();
        $total= count($pedidos);
        return view('pedido.proceso',compact('pedidos','total'));
    }

    public function enviadoIndex()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $pedidos = Pedido::where('id_estado',3)->get();
        $total= count($pedidos);
        return view('pedido.enviado',compact('pedidos','total'));
    }

    public function entregadoIndex()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $pedidos = Pedido::where('id_estado',4)->get();
        $total= count($pedidos);
        return view('pedido.entregado',compact('pedidos','total'));
    }

    public function pendienteConfirmar($id_pedido)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 

        DB::beginTransaction();

        try {
            $pedidos = Pedido::where('id_pedido',$id_pedido)->first();
            $detalles = PedidoDetalle::where('id_pedido',$id_pedido)->get();
            $ventas= Venta::where('id_pedido',$id_pedido)->first();

            $depositos= PedidoDeposito::where('id_pedido',$id_pedido)->first();
            
            return view('pedido.confirmarDeposito',compact('pedidos','detalles','depositos'));

        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
        }
      
        


    }

    public function guardarConfirmar(Request $request)
    {
        DB::beginTransaction();

        try {
            $id_pedido= request('id_pedido');
            $pedidos =  Pedido::findOrFail($id_pedido);
            $pedidos-> id_estado = 2;
            DB::Commit();
            $pedidos->update();
            
      
            event(new PedidoEvent($pedidos));
      
            return redirect('pedido-proceso')->with(['message' => '¡El pedido fue confirmado con exito! Ahora esta en Proceso.', 'alert' => 'alert-success']);

        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
        }
    
    
    }

    public function guardarEnviar(Request $request)
    {
      DB::beginTransaction();

        try {

            $id_pedido= request('id_pedido');
            $pedidos =  Pedido::findOrFail($id_pedido);
            $pedidos-> id_estado = 3;
            DB::Commit();
            $pedidos->update();
      
            event(new PedidoEvent($pedidos));
          
            return redirect()->back()->with(['message' => 'El pedido fue enviado con exito', 'alert' => 'alert-success']);

        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
        }
    
    }

    public function guardarEntregado(Request $request)
    {

     
        DB::beginTransaction();

            try {

                $id_pedido= request('id_pedido');
                $pedidos =  Pedido::findOrFail($id_pedido);
                $pedidos-> id_estado = 4;
                DB::Commit();
                $pedidos->update();
          
          
                if (Foliofactura::where('id_estado',1)->exists()) {
                  $ventas= Venta::where('id_pedido',$id_pedido)->first();
                
                  $folios= FolioFactura::where('id_estado',1)->first();
                  $id_folio= $folios->id_folio;
            
                  $total_venta= $ventas->total;
                  $impuesto15= $total_venta/1.15;
                  $gravado15= $total_venta-$impuesto15;
                  $contador= $folios->contador;
                  
                  $formatter = new NumeroALetras();
                  $formatter->conector = 'Y';
                  $letras=$formatter->toMoney($total_venta, 2, 'lempiras', 'centavos');
          
                  $facturas = new Factura();
                  $facturas-> codigo_factura = $contador;
                  $facturas-> id_folio = $id_folio;
                  $facturas-> id_venta = $ventas->id_venta;
                  $facturas-> fecha = $ventas->fecha;
                  $facturas-> descuentos = $ventas->descuento;
                  $facturas-> gravado15 =$gravado15;
                  $facturas-> gravado18 = 0;
                  $facturas-> impuesto15 = $impuesto15;
                  $facturas-> impuesto18 = 0;
                  $facturas-> total = $total_venta;
                  $facturas-> total_letras = $letras;
                  $facturas-> tipo = 1;
                  $facturas-> id_usuario = auth()->user()->id;
                  DB::Commit();
                  $facturas->save();
            
                
                  $folio = FolioFactura::find($id_folio);
                  $folio-> contador = $contador+1;
                  DB::Commit();
                  $folio->save();
            
                }
                event(new PedidoEvent($pedidos));

                return redirect()->back()->with(['message' => 'El pedido fue guardado como ENTREGADO con exito', 'alert' => 'alert-success']);
        
        } catch(\Exception $e){
            DB::Rollback();
            echo 'Error: ' .$e->getMessage();
        }
     
    }

    public function cancelar($id_pedido)
    {

        DB::beginTransaction();

        try {

            $pedidos = Pedido::find($id_pedido);
            $pedidos->id_estado = 5;
            $pedidos->save();
            DB::commit();

            event(new PedidoEvent($pedidos));

            return redirect('pedido-pendiente')->with(['message' => 'El pedido fue CANCELADO con exito', 'alert' => 'alert-danger']);
        
        } catch(\Exception $e){
        DB::Rollback();
        echo 'Error: ' .$e->getMessage();
        }
        

    }

    public function eliminar($id_pedido)
    {
        
       
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
    public function destroy($id_pedido)
    {
        $pedidos = Pedido::find($id_pedido);
        $pedidos->id_estado = 5;
        $pedidos->save();

        $ventas=Venta::where('id_pedido',$id_pedido)->first();
        $id_venta=$ventas->id_venta;

        $ventas = Venta::find($id_venta);
        $ventas->id_estado = 3;
        $ventas->save();

        return redirect('pedido-pendiente')->with(['message' => 'El pedido fue CANCELADO con exito', 'alert' => 'alert-success']);

    }
}
