<?php

use App\Events\OrderStatusChangeEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PublicidadController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\GraficaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\FolioFacturaController;
use App\Http\Controllers\ItemDescuentoController;
use App\Http\Controllers\CuentaBancariaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ComboDetalleController;
use App\Http\Controllers\CiudadController;

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('/home');
Route::get('/index', [HomeController::class, 'index'])->name('/index');


Route::get('combo-desactivar /{id_combo}', [ComboController::class, 'desactivar'])->name('combo-desactivar');
Route::get('producto-desactivar /{id_producto}', [ProductoController::class, 'desactivar'])->name('producto-desactivar');
Route::get('combo-detalle/ {id_combo}', [ComboDetalleController::class, 'detalles'])->name('combo-detalle');
Route::get('detalle-guardar/ {id_combo}', [ComboDetalleController::class, 'guardar'])->name('detalle-guardar');

Route::get('transaccion/abonar /{id_factura}', [TransaccionController::class, 'crear'])->name('transaccion/abonar');
Route::post('transaccion/guardar', [TransaccionController::class, 'guardar'])->name('transaccion/guardar');

Route::post('buscarProducto', [ProductoController::class, 'buscar'])->name('buscarProducto');

Route::post('folio-crear', [FolioFacturaController::class, 'crear'])->name('folio-crear');
Route::get('folio-desactivar/ {id_folio}', [FolioFacturaController::class, 'desactivar'])->name('folio-desactivar');


Route::get('cuenta-desactivar/ {id_cuenta}', [CuentaBancariaController::class, 'desactivar'])->name('cuenta-desactivar');
Route::get('ciudad-desactivar/ {id}', [CiudadController::class, 'desactivar'])->name('ciudad-desactivar');

Route::post('ventasSemanal', [GraficaController::class, 'ventasSemanal'])->name('ventasSemanal');
Route::post('pedidosSemanal', [GraficaController::class, 'pedidosSemanal'])->name('pedidosSemanal');
Route::post('ventasAnual', [GraficaController::class, 'ventasAnual'])->name('ventasAnual');

Route::get('pedido-cancelar /{id_pedido}', [PedidoController::class, 'cancelar'])->name('pedido-cancelar');
Route::get('pedido-pendiente', [PedidoController::class, 'pendienteIndex'])->name('pedido-pendiente');
Route::get('pedido-proceso', [PedidoController::class, 'procesoIndex'])->name('pedido-proceso');
Route::get('pedido-enviado', [PedidoController::class, 'enviadoIndex'])->name('pedido-enviado');
Route::get('pedido-entregado', [PedidoController::class, 'entregadoIndex'])->name('pedido-entregado');
Route::get('pedido-cancelado', [PedidoController::class, 'cancelados'])->name('pedido-cancelado');

Route::post('buscarPedido', [PedidoController::class, 'buscar'])->name('buscarPedido');

Route::get('pedido-confirmar /{id_pedido}', [PedidoController::class, 'pendienteConfirmar'])->name('pedido-confirmar');
Route::post('pedido-guardarConfirmar', [PedidoController::class, 'guardarConfirmar'])->name('pedido-guardarConfirmar');
Route::get('pedido-guardarEnviar /{id_pedido}', [PedidoController::class, 'guardarEnviar'])->name('pedido-guardarEnviar');
Route::get('pedido-guardarEntregado /{id_pedido}', [PedidoController::class, 'guardarEntregado'])->name('pedido-guardarEntregado');

Route::get('pedidos/crear /{id_compra}', [PedidoController::class, 'crear'])->name('pedidos/crear');
Route::post('crearPedido', [PedidoController::class, 'guardar'])->name('crearPedido');

Route::get('ventaDiaExportPdf', [ReporteController::class, 'exportVentaDiaPdf'])->name('ventaDiaExportPdf');
Route::get('ventaRangoExportPdf', [ReporteController::class, 'exportVentaRangoPdf'])->name('ventaRangoExportPdf');

Route::get('pedidoDiaExportPdf', [ReporteController::class, 'exportPedidoDiaPdf'])->name('pedidoDiaExportPdf');
Route::get('pedidoRangoExportPdf', [ReporteController::class, 'exportPedidoRangoPdf'])->name('pedidoRangoExportPdf');

Route::get('ventaRango.xlsx', [ReporteController::class, 'exportVentaExcel'])->name('ventaRangoExportExcel');

Route::get('reporte-pdf-venta', [ReporteController::class, 'ventaPdf'])->name('reporte-pdf-venta');
Route::get('reporte-excel-venta', [ReporteController::class, 'ventaExcel'])->name('reporte-excel-venta');



Route::get('reporte-pdf-pedido', [ReporteController::class, 'pedidoPdf'])->name('reporte-pdf-pedido');
Route::get('reporte-excel-pedido', [ReporteController::class, 'pedidoExcel'])->name('reporte-excel-pedido');



//Notificaciones vista
Route::get('leerNotificaciones', [PedidoController::class, 'leerNotificaciones'])->name('leerNotificaciones');

//Funcion js para leer todo en la campinita
Route::get('markAsRead', function(){
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

//leer todo en la vista
Route::post('/mark-as-read', [PedidoController::class, 'leyendoNotificaciones'])->name('markNotificationView');


Route::resource('publicidad', PublicidadController::class);
Route::resource('combo', ComboController::class);
Route::resource('descuento', DescuentoController::class);
Route::resource('oferta', OfertaController::class);
Route::resource('pedido', PedidoController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('credito', CreditoController::class);
Route::resource('transaccion', TransaccionController::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('producto', ProductoController::class);
Route::resource('venta', VentaController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('catalogo', CatalogoController::class);
Route::resource('folio', FolioFacturaController::class);
Route::resource('cuenta', CuentaBancariaController::class);
Route::resource('factura', FacturaController::class);
Route::resource('itemDescuento', ItemDescuentoController::class);
Route::resource('comboDetalle', ComboDetalleController::class);
Route::resource('ciudad', CiudadController::class);


