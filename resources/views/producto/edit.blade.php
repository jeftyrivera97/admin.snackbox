@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Editar Producto</h1>
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

<form action="{!!route('producto.update', $productos->id_producto)!!}" method="POST">
    @method('PATCH')
    @csrf
<div class="container-fluid">
<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Datos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Titulo</label>
                      <input type="text" class="form-control input-rounded" required  value="{{$productos->titulo}}" id="titulo"  name="titulo">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Contenido</label>
                      <input type="text" class="form-control input-rounded"  required value="{{$productos->descripcion}}" id="descripcion"  name="descripcion">
                    </div>
              
                  </div>
                  <div class="row">
              
                   <div class="form-group col-md-6">
                    <label>Precio de Venta</label>
                    <input type="number" class="form-control input-rounded"  value="{{$productos->precio}}" required step="any" id="precio"  name="precio">
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
</form>

@endsection			