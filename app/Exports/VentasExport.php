<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VentasExport implements FromView
{

    public function __construct($fecha_inicio, $fecha_final)
    {
        $this->fecha_inicio = $fecha_inicio;
       $this->fecha_final = $fecha_final;
    }

    public function view(): View
    {
        return view('excel.ventas', [
            'ventas' => Venta::where('fecha', '>=', "$this->fecha_inicio 00:00:00")->where('fecha', '<=', "$this->fecha_final 23:59:59")->orderBy('fecha')->paginate()
        ]);

     
    }
}
