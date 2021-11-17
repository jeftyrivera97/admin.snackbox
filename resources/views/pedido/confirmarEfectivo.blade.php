@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Confirmar Pedido</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('pedido-pendiente') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')
<form action="{!!route('pedido-guardarConfirmar')!!}" method="POST"> 
    @csrf
  <div class="container-fluid">
  <div class="row">
      <div class="col-xl-6 col-lg-12">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos del Pedido</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>Tipo de Pago</label>
                    <input type="text" class="form-control input-rounded" readonly value="Pago en Efectivo"  placeholder="" id="tipo_pago"  name="tipo_pago">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Total Pedido</label>
                    <input type="text" class="form-control input-rounded" readonly value="L. {{$pedidos->total}}.00" placeholder="codigo_pedido" id="codigo_pedido"  name="titulo">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Total por Pagar</label>
                    <input type="text" class="form-control input-rounded" readonly value="L. {{$pedidos->total}}.00" placeholder="" id="tipo_pago"  name="tipo_pago">
                  </div>
                </div>
                  <div class="row">
                      <div class="form-group col-md-4">
                        <label>CLíneadigo Pedido</label>
                        <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->codigo_pedido}}" placeholder="codigo_pedido" id="codigo_pedido"  name="titulo">
                        <input type="text" class="form-control input-rounded" hidden value="{{$pedidos->id_pedido}}" placeholder="id_pedido" id="id_pedido"  name="id_pedido">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Cliente</label>
                        <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->cliente->nombre}} {{$pedidos->cliente->apellido}}"  placeholder="" id="nombre"  name="nombre">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Teléfono Contacto</label>
                        <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->cliente->telefono}}"  placeholder="" id="telefono"  name="telefono">
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Fecha Realizado</label>
                            <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->fecha_pedido}}"  placeholder="" id="fecha_pedido"  name="fecha_pedido">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Fecha de Entrega</label>
                            <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->fecha_entrega}} " required placeholder="" id="fecha_entrega"  name="fecha_entrega">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Hora de Entrega</label>
                            <input type="text" class="form-control input-rounded" readonly value="{{$pedidos->hora_entrega}}" required placeholder="" id="hora_entrega"  name="hora_entrega">
                          </div>
                    </div>
                     
                      <label>Detalle del Pedido</label>
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-sm">
                        <thead>
                            <tr>
                              <th scope="col">Código Pedido</th>
                              <th scope="col">Línea</th>
                              <th scope="col">Producto</th>
                              <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>   
                          @foreach($detalles as $detalle)
                          <tr>
                            <td>{{$detalle->pedido->codigo_pedido}}</td>
                            <td>{{$detalle->linea}}</td>
                            <td>{{$detalle->item->titulo}}</td>
                            <td>{{$detalle->cantidad}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    </div>
                      
                    </div>            
              </div>
                <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" class="btn btn-info active"><i class="fas fa-check"></i> Confirmar</button>
              </div>
          </div>
          <!-- /.card -->
      </div>
  </div>
  </div>
  

@endsection
