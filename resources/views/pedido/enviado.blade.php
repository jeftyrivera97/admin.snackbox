@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Pedidos Enviados </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
     
    </div>
  </div>
</div>
@endsection 
@section('content')
<div class="container-fluid">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"> <i class="fas fa-truck"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Pedidos Enviados</span>
          <span class="info-box-number">
            {{$total}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>
  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th scope="col">ID Pedido</th>
          <th scope="col">Código Pedido</th>
          <th scope="col">Cliente</th>
          <th scope="col">Contacto</th>
          <th scope="col">Fecha de Pedido</th>
          <th scope="col">Fecha de Entrega</th>
          <th scope="col">Hora de Entrega</th>
          <th scope="col">Estado</th>
          <th scope="col">Dirección de Entrega</th>
          <th scope="col">Total</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($pedidos as $pedido)
      <tr>
        <td>{{$pedido->id_pedido}}</td>
        <td>{{$pedido->codigo_pedido}}</td>
        <td>{{$pedido->cliente->nombre}} {{$pedido->cliente->apellido}}</td>
        <td>(+504){{$pedido->cliente->telefono}}</td>
        <td>{{$pedido->fecha_pedido}}</td>
        <td>{{$pedido->fecha_entrega}}</td>
        <td>{{$pedido->hora_entrega}}</td>
        <td>{{$pedido->estado->descripcion}}</td>
        <td>{{$pedido->direccion_entrega}}</td>
        <td> L. {{$pedido->total}}</td>
        <td> <a href="{!! route('pedido-guardarEntregado', $pedido->id_pedido)!!}"><button type="button" class="btn btn-success active btn-sm"><i class="fas fa-dolly"></i> Entregado</button></a></td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>


@endsection
