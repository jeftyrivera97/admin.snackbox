@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Resultado de Búsqueda:</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('/') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')
<div class="container-fluid">
    <div class="card" style="width: 22rem;">
    <div class="card-header">
     ¡NO SE ENCONTRARON RESULTADOS!
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Intente cambiar el Código</b></li>
    </ul>
  </div>
 
  </div>

@endsection