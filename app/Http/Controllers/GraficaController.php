<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\Pedido;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class GraficaController extends Controller
{

    
    public function ventasSemanal(Request $request)
    {

        $semana1=Venta::where('fecha', '>=', '2021-09-01 00:00:00')->where('fecha', '<=', '2021-09-07 23:59:59')->where('id_estado',1)->sum('total');
        $semana2=Venta::where('fecha', '>=', '2021-09-08 00:00:00')->where('fecha', '<=', '2021-09-14 23:59:59')->where('id_estado',1)->sum('total');
        $semana3=Venta::where('fecha', '>=', '2021-09-15 00:00:00')->where('fecha', '<=', '2021-05-21 23:59:59')->where('id_estado',1)->sum('total');
        $semana4=Venta::where('fecha', '>=', '2021-09-22 00:00:00')->where('fecha', '<=', '2021-09-31 23:59:59')->where('id_estado',1)->sum('total');
     

        $collection = collect([
            ['descripcion' => '01/sep - 07/sep', 'total' => $semana1],
            ['descripcion' => '08/sep - 14/sep', 'total' => $semana2],
            ['descripcion' => '15/sep - 21/sep', 'total' => $semana3],
            ['descripcion' => '22/sep - 31/sep', 'total' => $semana4],
        ]);
        

       
       return response(json_encode($collection),200)->header('Content-type','text/plain');

    } 

    public function ventasAnual(Request $request)
    {

        $abril=Venta::where('fecha', '>=', '2021-04-01 00:00:00')->where('fecha', '<=', '2021-04-30 23:59:59')->where('id_estado',1)->sum('total');
        $mayo=Venta::where('fecha', '>=', '2021-05-01 00:00:00')->where('fecha', '<=', '2021-05-30 23:59:59')->where('id_estado',1)->sum('total');
        $junio=Venta::where('fecha', '>=', '2021-06-01 00:00:00')->where('fecha', '<=', '2021-06-30 23:59:59')->where('id_estado',1)->sum('total');
        $julio=Venta::where('fecha', '>=', '2021-07-01 00:00:00')->where('fecha', '<=', '2021-07-30 23:59:59')->where('id_estado',1)->sum('total');
        $agosto=Venta::where('fecha', '>=', '2021-08-01 00:00:00')->where('fecha', '<=', '2021-08-30 23:59:59')->where('id_estado',1)->sum('total');
        $septiembre=Venta::where('fecha', '>=', '2021-09-01 00:00:00')->where('fecha', '<=', '2021-09-31 23:59:59')->where('id_estado',1)->sum('total');
     

        $collection = collect([
            ['descripcion' => 'abril', 'total' => $abril],
            ['descripcion' => 'mayo', 'total' => $mayo],
            ['descripcion' => 'junio', 'total' => $junio],
            ['descripcion' => 'julio', 'total' => $julio],
            ['descripcion' => 'agosto', 'total' => $agosto],
            ['descripcion' => 'septiembre', 'total' => $septiembre],
        ]);
        
       return response(json_encode($collection),200)->header('Content-type','text/plain');

    } 
    
  
    public function pedidosSemanal(Request $request)
    {
        $estados = [1, 2, 3, 4];
       
        $s1=Pedido::where('fecha_pedido', '>=', '2021-09-01 00:00:00')->where('fecha_pedido', '<=', '2021-09-07 23:59:59')->whereIn('id_estado',$estados)->get();
        $s2=Pedido::where('fecha_pedido', '>=', '2021-09-08 00:00:00')->where('fecha_pedido', '<=', '2021-09-14 23:59:59')->whereIn('id_estado',$estados)->get();
        $s3=Pedido::where('fecha_pedido', '>=', '2021-09-15 00:00:00')->where('fecha_pedido', '<=', '2021-09-21 23:59:59')->whereIn('id_estado',$estados)->get();
        $s4=Pedido::where('fecha_pedido', '>=', '2021-09-22 00:00:00')->where('fecha_pedido', '<=', '2021-09-31 23:59:59')->whereIn('id_estado',$estados)->get();

        $semana1= count($s1);
        $semana2= count($s2);
        $semana3= count($s3);
        $semana4= count($s4);
     

       
        $collection = collect([
            ['descripcion' => '01/sep - 07/sep', 'total' => $semana1],
            ['descripcion' => '08/sep - 14/sep', 'total' => $semana2],
            ['descripcion' => '15/sep - 21/sep', 'total' => $semana3],
            ['descripcion' => '22/sep - 31/sep', 'total' => $semana4],
        ]);
        
        

       
       return response(json_encode($collection),200)->header('Content-type','text/plain');
       
     
    }  

    
}
