@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Detalle del Combo</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('combo') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')

<form action="{!!route('detalle-guardar', $combo->id_combo)!!}">
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
                      <label>Combo</label>
                      <input type="text" class="form-control" readonly  value="{{$combo->titulo}}" id="titulo"  name="titulo">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Precio (L.)</label>
                      <input type="text" class="form-control" readonly  value="L. {{$combo->precio}}" id="precio"  name="precio">
                    </div>
                  
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Producto</label>
                      <select name="id_producto" required focus id="id_producto" class="form-control input-rounded">
                        <option value="">--Seleccione--</option>
                        @foreach($productos as $producto)
                        <option value="{{$producto->id_producto}}">{{$producto->titulo}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Cantidad</label>
                        <input type="number" class="form-control"  id="cantidad"  name="cantidad">
                      </div>
                  </div>
                  
            </div>
              <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info active"><i class="fas fa-plus"></i> Agregar</button>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
</form>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
      <table id="example1" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
            <th scope="col">Combo</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Opciones</th>
           
          </tr>
      </thead>
      <tbody>   
        @foreach($detalles as $detalle)
        <tr>
          <td>{{$detalle->combo->titulo}}</td>
          <td>{{$detalle->producto->titulo}}</td>
          <td>{{$detalle->cantidad}}</td>
          <td>
            <form method="POST" action="{!! route('comboDetalle.destroy',$detalle->id) !!}">
              @csrf
              @method('DELETE')
         <button type="submit" class="btn btn-danger active btn-sm"><i class="fas fa-fw fa-minus"></i></button></a>
            </form>
        </td>
        </tr>
    @endforeach
      </tbody>
  </table>
  </div>
  </div>
</div>
</div>
</form>

@endsection			