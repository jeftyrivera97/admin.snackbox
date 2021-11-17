@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Descuentos </h1>
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
    <div class="col-sm-12">
      <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th scope="col">ID Descuento</th>
          <th scope="col">Descripción</th>
          <th scope="col">Monto</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($descuentos as $descuento)
      <tr>
        <td>{{$descuento->id_descuento}}</td>
        <td>{{$descuento->descripcion}}</td>
        <td>{{$descuento->valor}}</td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
