@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Productos</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('producto/create') !!}"><button type="button" class="btn btn-primary active btn-sm"> <i class="fas fa-fw fa-plus"></i>Nuevo</button></a></li>
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
          <th scope="col">Código Producto</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripción</th>
          <th scope="col">Precio</th>
          <th scope="col">Imagen</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>   
      @foreach($productos as $producto)
      <tr>
        <td>{{$producto->codigo_producto}}</td>
        <td>{{$producto->titulo}}</td>
        <td>{{$producto->descripcion}}</td>
        <td>{{$producto->precio}}</td>
        <td><img src="{{$producto->ruta_imagen}}" width="50" height="50"></td>
        <td>{{$producto->estado->descripcion}}</td>
        <td>
          <a href="{!! route('producto.edit', $producto->id_producto)!!}"><button type="button" class="btn btn-success active btn-sm"> <i class="fas fa-fw fa-sync-alt"></i>Actualizar</button></a>
          <a href="{!! route('producto-desactivar', $producto->id_producto)!!}"><button type="button" class="btn btn-danger active btn-sm"><i class="fas fa-fw fa-minus"></i>Eliminar</button></a>
         
        </td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>

@endsection
