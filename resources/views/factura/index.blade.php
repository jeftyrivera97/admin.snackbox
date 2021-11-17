@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Facturas</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')
<div class="container-fluid">
  <div class="row">
  <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Código Factura</th>
          <th scope="col">Fecha</th>
          <th scope="col">Gravado 15%</th>
          <th scope="col">Impuesto 15%</th>
          <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($facturas as $factura)
      <tr>
        <td>{{$factura->id_factura}}</td>
        <td> 000-001-01-{{ str_pad ($factura->codigo_factura, 8, '0', STR_PAD_LEFT) }}</td>
        <td>{{$factura->fecha}}</td>
        <td>{{$factura->gravado15}}</td>
        <td>{{$factura->impuesto15}}</td>
        <td>{{$factura->total}}</td>   
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection

