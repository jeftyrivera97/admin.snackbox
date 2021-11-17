@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Nuevo Descuento</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('itemDescuento') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')

<form action="/itemDescuento" method="POST"> 
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
                    <label for="id_item">Combo/Producto</label>
                      <select name="id_item" required  id="id_item" name="id_item" class="form-control input-rounded">
                        <option value="">--Seleccione el Combo/Producto--</option>
                        @foreach($items as $item)
                        <option value="{{$item->id_item}}">{{$item->titulo}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="id_descuento">Descuento</label>
                          <select name="id_descuento" required  id="id_descuento" name="id_descuento" class="form-control input-rounded">
                            <option value="">--Seleccione el Descuento--</option>
                            @foreach($descuentos as $descuento)
                            <option value="{{$descuento->id_descuento}}">{{$descuento->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>

                  <div class="row">
                   
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

<script>

/*
$(document).ready(function() {

$('#id_descuento').change(function() {
   
    var descuento=document.getElementById("id_descuento").value;
    var actual=document.getElementById("precio_actual").value;

    var num= actual*descuento;
    var precio_nuevo= actual-num;

    document.getElementById("precio_nuevo").value=precio_nuevo;
    document.getElementById("precio_n").value=precio_nuevo;


});


});

*/

</script>

@endsection			