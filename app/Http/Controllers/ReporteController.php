<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\Venta;
use App\Models\Cuenta;
use App\Models\EstadoPedido;
use App\Models\EstadoVenta;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function ventaPdf()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
       
        return view('reporte.pdf.ventas');
    }

    public function pedidoPdf()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
       
        return view('reporte.pdf.pedidos');
    }

    public function ventaExcel()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
       
        return view('reporte.excel.ventas');
    }

    public function pedidoExcel()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
       
        return view('reporte.excel.pedidos');
    }
    
    public function exportVentaExcel(Request $request)
    {
       
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'fecha_inicial' => 'required', 
            'fecha_final' => 'required', 
        ]);
      
        $fechaInicial= request ('fecha_inicial');
        $fechaFinal= request ('fecha_final');
        $Noexiste= DB::table('ventas')->where('fecha', '>=', "$fechaInicial 00:00:00")->where('fecha', '<=', "$fechaFinal 23:59:59")->doesntExist();
        if($Noexiste==true)
        {
            return redirect()->back()->with(['message' => 'No existen registros para esta fecha.', 'alert' => 'alert-danger']);
            
        }
        return Excel::download(new VentasExport($fechaInicial,$fechaFinal), 'ventaRango.xlsx');
       
        
    }
 

    public function exportVentaDiaPdf(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $validatedData = $request->validate([
            'fecha' => 'required', 
        ]);
        $buscar= request ('fecha');
        $Noexiste= DB::table('ventas')->where('fecha', '>=', "$buscar 00:00:00")->where('fecha', '<=', "$buscar 23:59:59")->doesntExist();
        if($Noexiste==true)
        {
            return redirect()->back()->with(['message' => 'No existen registros para esta fecha.', 'alert' => 'alert-danger']);
            
        }
        $hoy = Carbon::today();
        $fecha= request ('fecha');
        
        $ventas = Venta::where('fecha', '>=', "$fecha 00:00:00")->where('fecha', '<=', "$fecha 23:59:59")->where('id_estado',1)->get();
        $total = Venta::where('fecha', '>=', "$fecha 00:00:00")->where('fecha', '<=', "$fecha 23:59:59")->where('id_estado',1)->sum('total');
        $empresa= DB::table('empresas')->where('id_empresa','1')->first();
        
        $pdf=PDF::loadView('pdf.ventas.ventaDia',compact('ventas','total','hoy','empresa','fecha'));
        return $pdf->download('ventadelDia.pdf');
    }
    
    public function exportVentaRangoPdf(Request $request)
    {  if(!Auth::check())
        {
            return redirect('/login');
        } 
        $validatedData = $request->validate([
            'fecha_inicial' => 'required', 
            'fecha_final' => 'required', 
        ]);
        $fechaInicial= request ('fecha_inicial');
        $fechaFinal= request ('fecha_final');
        $Noexiste= DB::table('ventas')->where('fecha', '>=', $fechaInicial)->where('fecha', '<=', $fechaFinal)->doesntExist();
        if($Noexiste==true)
        {
            return redirect()->back()->with(['message' => 'No existen registros para esta fecha.', 'alert' => 'alert-danger']);
            
        }

        $hoy = Carbon::today();
        $empresa= DB::table('empresas')->where('id_empresa','1')->first();
        $fechaInicial= request ('fecha_inicial');
        $fechaFinal= request ('fecha_final');
        $total = Venta::where('fecha', '>=', "$fechaInicial 00:00:00")->where('fecha', '<=', "$fechaFinal 23:59:59")->where('id_estado',1)->sum('total');

        $ventas = Venta::where('fecha', '>=', "$fechaInicial 00:00:00")->where('fecha', '<=', "$fechaFinal 23:59:59")->where('id_estado',1)->get();
        $total= number_format($total, 2);

        $pdf=PDF::loadView('pdf.ventas.ventaRango',compact('ventas','total','hoy','empresa','fechaInicial','fechaFinal'));
        $pdf->setPaper('Letter', 'portrait');
        return $pdf->download('ventaRango.pdf');
    }

    public function exportPedidoDiaPdf(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        } 
        $validatedData = $request->validate([
            'fecha' => 'required', 
        ]);
        $buscar= request ('fecha');
        $Noexiste= DB::table('pedidos')->where('fecha_pedido', '>=', "$buscar 00:00:00")->where('fecha_pedido', '<=', "$buscar 23:59:59")->doesntExist();
        if($Noexiste==true)
        {
            return redirect()->back()->with(['message' => 'No existen registros para esta fecha.', 'alert' => 'alert-danger']);
            
        }
        $hoy = Carbon::today();
        $fecha= request ('fecha');
        
        $pedidos = Pedido::where('fecha_pedido', '>=', "$fecha 00:00:00")->where('fecha_pedido', '<=', "$fecha 23:59:59")->get();
        $total = Venta::where('fecha', '>=', "$fecha 00:00:00")->where('fecha', '<=', "$fecha 23:59:59")->where('id_estado',1)->sum('total');
        $empresa= DB::table('empresas')->where('id_empresa','1')->first();
        
        $pdf=PDF::loadView('pdf.pedidos.pedidoDia',compact('pedidos','total','hoy','empresa','fecha'));
        return $pdf->download('pedidoDia.pdf');
    }
    
    public function exportPedidoRangoPdf(Request $request)
    {  if(!Auth::check())
        {
            return redirect('/login');
        } 
        $validatedData = $request->validate([
            'fecha_inicial' => 'required', 
            'fecha_final' => 'required', 
        ]);
        $fechaInicial= request ('fecha_inicial');
        $fechaFinal= request ('fecha_final');
        $Noexiste= DB::table('pedidos')->where('fecha_pedido', '>=', $fechaInicial)->where('fecha_pedido', '<=', $fechaFinal)->doesntExist();
        if($Noexiste==true)
        {
            return redirect()->back()->with(['message' => 'No existen registros para esta fecha.', 'alert' => 'alert-danger']);
            
        }

        $hoy = Carbon::today();
        $empresa= DB::table('empresas')->where('id_empresa','1')->first();
        $fechaInicial= request ('fecha_inicial');
        $fechaFinal= request ('fecha_final');
        $total = Venta::where('fecha', '>=', "$fechaInicial 00:00:00")->where('fecha', '<=', "$fechaFinal 23:59:59")->where('id_estado',1)->sum('total');

        $pedidos = Pedido::where('fecha_pedido', '>=', "$fechaInicial 00:00:00")->where('fecha_pedido', '<=', "$fechaFinal 23:59:59")->orderBy('fecha_pedido')->get();
        $total= number_format($total, 2);

        $pdf=PDF::loadView('pdf.pedidos.pedidoRango',compact('pedidos','total','hoy','empresa','fechaInicial','fechaFinal'));
        $pdf->setPaper('Letter', 'portrait');
        return $pdf->download('pedidoRango.pdf');
    }



    

}
