@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Editar Combo</h1>
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

<form action="{!!route('combo.update', $combos->id_combo)!!}" method="POST">
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
                      <input type="text" class="form-control input-rounded" required  value="{{$combos->titulo}}" id="titulo"  name="titulo">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Contenido</label>
                      <input type="text" class="form-control input-rounded"  required value="{{$combos->descripcion}}" id="descripcion"  name="descripcion">
                    </div>
              
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="tag">Etiqueta</label>
                      <select name="tag" required focus id="tag" class="form-control input-rounded">
                        <option value="">--Seleccione--</option>
                        <option value="Amor">Amor</option>
                        <option value="Amistad">Amistad</option>
                        <option value="Cumpleaños">Cumpleaños</option>
                        <option value="Graduacion">Graduación</option>
                        <option value="Fiestas">Fiestas</option>
                        <option value="Navidad">Navidad</option>
                        <option value="Artesanal">Artesanal</option>
                        <option value="Año Nuevo">Año Nuevo</option>
                        <option value="Halloween">Halloween</option>
                        <option value="Dia del Padre">Día del Padre</option>
                        <option value="Dia de la Madre">Día de la Madre</option>
                        <option value="Dia de la Mujer">Día de la Mujer</option>
                        <option value="Dia del Hombre">Día del Hombre</option>
                        <option value="Dia del Niño">Día del Niño</option>
                        <option value="Para Ella">Para Ella</option>
                        <option value="Para El">Para El</option>
                      </select>
                   </div>
                   <div class="form-group col-md-6">
                    <label>Precio de Venta</label>
                    <input type="number" class="form-control input-rounded"  value="{{$combos->precio}}" required step="any" id="precio"  name="precio">
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