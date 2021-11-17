@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Cuentas Bancarias de Depósito </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!! url('cuenta/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
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
          <th scope="col">Numero de Cuenta</th>
          <th scope="col">Banco</th>
          <th scope="col">Titulo</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($cuentas as $cuenta)
      <tr>
        <td>{{$cuenta->id_cuenta}}</td>
        <td>{{$cuenta->codigo_cuenta}}</td>
        <td>{{$cuenta->banco}}</td>
        <td>{{$cuenta->titular}}</td>
        <td>{{$cuenta->estado->descripcion}}</td>
        <td>
          @if ($cuenta->id_estado===1) 
          <a href="{!! route('cuenta-desactivar', $cuenta->id_cuenta)!!}"><button type="button" class="btn btn-danger active btn-sm">Desactivar</button></a>
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