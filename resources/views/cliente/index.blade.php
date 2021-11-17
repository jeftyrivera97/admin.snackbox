@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Clientes</h1>
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
          <th scope="col">Código Cliente</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Sexo</th>
          <th scope="col">Ciudad</th>
          <th scope="col">Departamento</th>
         
        </tr>
    </thead>
    <tbody>   
      @foreach($clientes as $cliente)
      <tr>
        <td>{{$cliente->codigo_cliente}}</td>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->apellido}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->sexo}}</td>
        <td>{{$cliente->ciudad}}</td>
        <td>{{$cliente->departamento}}</td>
  
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection

