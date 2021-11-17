@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Descuentos en Ítems </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!! url('itemDescuento/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
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
          <th scope="col">ID</th>
          <th scope="col">Combo</th>
          <th scope="col">% Descuento</th>
          <th scope="col">Precio s/n Descuento</th>
          <th scope="col">Precio c/n Descuento</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($itemsD as $itemD)
      <tr>
        <td>{{$itemD->id}}</td>
        <td>{{$itemD->item->titulo}}</td>
        <td>{{$itemD->descuento->descripcion}}</td>
        <td>L. {{$itemD->item->precio}}</td>
        <td>L. {{$itemD->precio_nuevo}}</td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>


@endsection