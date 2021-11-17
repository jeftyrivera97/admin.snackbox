@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Catalogo </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!! url('catalogo/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
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
          <th scope="col">Id</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Imagen</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($catalogos as $catalogo)
      <tr>
        <td>{{$catalogo->id_catalogo}}</td>
        <td>{{$catalogo->descripcion}}</td>
        <td><img src="{{$catalogo->ruta_imagen}}" width="50" height="50"></td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
