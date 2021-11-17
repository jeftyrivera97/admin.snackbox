@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Ventas </h1>
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
        <span class="info-box-text">Ventas Anual</span>
          <span class="info-box-number">
            L. {{$ventasAnual}}.00
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
        <span class="info-box-text">Ventas {{$mes}} </span>
          <span class="info-box-number">
            L. {{$ventasMes}}.00
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
            <th scope="col">Id venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">N° Pedido</th>
            <th scope="col">Cliente</th>
            <th scope="col">Estado</th>
            <th scope="col">Metodo de Pago</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>   
          @foreach($ventas as $venta)
            <tr>
              <td>{{$venta->id_venta}}</td>
              <td>{{$venta->fecha}}</td>
              <td>{{$venta->pedido->codigo_pedido}}</td>
              <td>{{$venta->cliente->nombre}} {{$venta->cliente->apellido}}</td>
              <td>{{$venta->estado->descripcion}}</td>
              <td>{{$venta->pago->descripcion}}</td>
              <td>L. {{$venta->total}}</td> 
          </tr>
      @endforeach
        </tbody>
    </table>
    </div>
    </div> 
  </div>



@endsection
