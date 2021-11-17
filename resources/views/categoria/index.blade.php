@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Categorías</h1>
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
          <th scope="col">ID Categoría</th>
          <th scope="col">Descripción</th>
          <th scope="col">Sección</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($categorias as $categoria)
      <tr>
        <td>{{$categoria->id_categoria}}</td>
        <td>{{$categoria->descripcion}}</td>
        <td>{{$categoria->tipoCategoria->descripcion}}</td>
      <td>{{$categoria->id_categoria}}</td>
  
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection

