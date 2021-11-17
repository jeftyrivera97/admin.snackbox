@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Combos </h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!! url('combo/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
        </ol>
      </div>
  </div>
</div>
@endsection 
@section('content')
<div class="container-fluid">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"> <i class="fas fa-fire-alt"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Combos Populares</span>
          <span class="info-box-number">
             {{$populares}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"> <i class="fas fa-chart-line"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Combos en Tendencia </span>
          <span class="info-box-number">
            {{$tendencias}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>

  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th scope="col">ID Combo</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripción</th>
          <th scope="col">Imagen</th>
          <th scope="col">Precio</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
         
        </tr>
    </thead>
    <tbody>   
      @foreach($combos as $combo)
      <tr>
        <td>{{$combo->id_combo}}</td>
        <td>{{$combo->titulo}}</td>
        <td>{{$combo->descripcion}}</td>
        <td><img src="{{$combo->ruta_imagen}}" width="50" height="50"></td>
        <td>{{$combo->precio}}</td>
        <td>{{$combo->estado->descripcion}}</td>
        <td>
        <a href="{!! route('combo-detalle', $combo->id_combo)!!}"><button type="button" class="btn btn-info active btn-sm"> <i class="fas fa-fw fa-list-alt"></i>Contenido</button></a>
        <a href="{!! route('combo.edit', $combo->id_combo)!!}"><button type="button" class="btn btn-success active btn-sm"> <i class="fas fa-fw fa-sync-alt"></i>Actualizar</button></a>
        <a href="{!! route('combo-desactivar', $combo->id_combo)!!}"><button type="button" class="btn btn-danger active btn-sm"><i class="fas fa-fw fa-minus"></i>Eliminar</button></a>
       
      </td>
      </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>


@endsection
