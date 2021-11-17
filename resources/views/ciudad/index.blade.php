@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Ciudades de Entrega</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!! url('ciudad/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
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
          <th scope="col">Ciudad</th>
          <th scope="col">Departamento</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($ciudades as $ciudad)
      <tr>
        <td>{{$ciudad->id}}</td>
        <td>{{$ciudad->ciudad}}</td>
        <td>{{$ciudad->departamento}}</td>
        <td>{{$ciudad->estado->descripcion}}</td>
        <td>
          @if ($ciudad->id_estado===1) 
          <a href="{!! route('ciudad-desactivar', $ciudad->id)!!}"><button type="button" class="btn btn-danger active btn-sm">Desactivar</button></a>
          @endif
        </td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>


@endsection