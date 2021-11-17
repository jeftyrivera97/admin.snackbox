<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Venta;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\FolioFactura;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserFormRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
            //Solo Admins
            //$request->user()->authorizeRoles(['admin']);
            $role = 'admin';
            if (! $request->user()->hasRole($role)) {

                $request->session()->flush();
            
                $request->session()->regenerate();
            
                return redirect('login');
            }
            else
            {
                $empresas=DB::table('empresas')->where('id_empresa','1')->first();
                $ventas=Venta::where('id_estado',1)->sum('total');
        
                $pedidosConfirmar = Pedido::where('id_estado',1)->get();
                $TpedidosConfirmar= count($pedidosConfirmar);
        
                $pedidosProceso = Pedido::where('id_estado',2)->get();
                $TpedidosProceso= count($pedidosProceso);
        
                $clientes=Cliente::where('tipo',1)->get();
                $Tclientes=count($clientes);
                
            
                return view('home', compact('ventas','TpedidosConfirmar','TpedidosProceso','Tclientes'));
            }
            //
            //Auth::logout();
            
        
    }
}
