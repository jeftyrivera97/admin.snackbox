@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Nuevo Producto</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('producto') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')

<form action="/producto" method="POST" enctype="multipart/form-data"> 
  @csrf
<div class="container-fluid">
<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Datos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Titulo</label>
                      <input type="text" class="form-control input-rounded" maxlength="25" required focus placeholder="" id="titulo"  name="titulo">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Descripción</label>
                      <input type="text" class="form-control input-rounded" maxlength="16" required focus placeholder="" id="descripcion"  name="descripcion">
                    </div>
                  
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Código Producto</label>
                      <input type="text" class="form-control input-rounded" required focus placeholder="" id="codigo_producto"  name="codigo_producto">
                    </div>

                    <div class="form-group col-md-6">
                      <label> Categorías</label><br>
                      @foreach($categorias as $categoria)
                      <input type="checkbox" id="{{$categoria->descripcion}}" name="{{$categoria->descripcion}}" value="{{$categoria->id_categoria}}">
                      <label for="{{$categoria->descripcion}}">{{$categoria->descripcion}}</label><br>
                      @endforeach
                    </div>
                    
                  </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Precio de Venta</label>
                        <input type="number" class="form-control input-rounded" required focus step="any" placeholder="L." id="precio"  name="precio">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="archivo">Imagen:</label><br>
                        <input type="file" name="img" id="img" required focus >
                      </div>
                      
                    </div>
            </div>
              <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info active"><i class="far fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
</div>

@endsection			