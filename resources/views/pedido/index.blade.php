@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Pedidos </h1>
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
        <span class="info-box-icon bg-success elevation-1"> <i class="fas fa-hand-holding-usd"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Pedidos en Proceso</span>
          <span class="info-box-number">
           # 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"> <i class="fas fa-hand-holding-usd"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Pedidos Entregados </span>
          <span class="info-box-number">
           # 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <!-- /.col -->
  </div>
</div>
<div class="row col-12">
  <div class="col-md-4">
    <!-- AREA CHART -->
    <div class="card card-light">
      <div class="card-header">
        <h3 class="card-title"><b>Pedidos Mensual</b></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
         
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-4">
    <!-- AREA CHART -->
    <div class="card card-light">
      <div class="card-header">
        <h3 class="card-title"><b>Pedidos Anual</b></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
         
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
          <th scope="col">Fecha de Pedido</th>
          <th scope="col">Fecha de Entrega</th>
          <th scope="col">Hora de Entrega</th>
          <th scope="col">Estado</th>
          <th scope="col">Dirección de Entrega</th>
          <th scope="col">Destinatario</th>
          <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($pedidos as $pedido)
      <tr>
        <td>{{$pedido->id_pedido}}</td>
        <td>{{$pedido->codigo_pedido}}</td>
        <td>{{$pedido->fecha_pedido}}</td>
        <td>{{$pedido->fecha_entrega}}</td>
        <td>{{$pedido->hora_entrega}}</td>
        <td>{{$pedido->estado->descripcion}}</td>
        <td>{{$pedido->direccion_entrega}}</td>
        <td>{{$pedido->destinatario}}</td>
        <td> L. {{$pedido->total}}</td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>


@endsection
