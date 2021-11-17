@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Folios de Facturación</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')
@include('folio.modal')
<div class="container-fluid">
  <div class="row">
  <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th scope="col">ID Folio</th>
          <th scope="col">Inicio</th>
          <th scope="col">Final</th>
          <th scope="col">Fecha Inicial</th>
          <th scope="col">Fecha Final</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($folios as $folio)
      <tr>
        <td>{{$folio->id_folio}}</td>
        <td>{{$folio->inicio}}</td>
        <td>{{$folio->final}}</td>
        <td>{{$folio->fecha_inicial}}</td>
        <td>{{$folio->fecha_final}}</td>
        <td>{{$folio->estado->descripcion}}</td>
        <td>
          @if ($folio->id_estado===1) 
          <a href="{!! route('folio-desactivar', $folio->id_folio)!!}"><button type="button" class="btn btn-danger active btn-sm">Desactivar</button></a>
          @endif
        </td>
      
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection

