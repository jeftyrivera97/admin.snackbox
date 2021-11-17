@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Nueva Ciudad de Entrega</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('ciudad') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')

<form action="/ciudad" method="POST"> 
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
                        <label>Ciudad</label>
                        <input type="text" class="form-control input-rounded"  required placeholder="" id="ciudad"  name="ciudad">
                    </div>

                    <div class="form-group col-md-6">
                    <label for="departamento">Departamento</label>
                      <select name="departamento" required  id="departamento" name="departamento" class="form-control">
                        <option value="">--Seleccione--</option>
                        <option value="Atlántida">Atlántida</option>
                        <option value="Colón">Colón</option>
                        <option value="Comayagua">Comayagua</option>
                        <option value="Copán">Copán</option>
                        <option value="Cortés">Cortés</option>
                        <option value="Choluteca">Choluteca</option>
                        <option value="El Paraíso">El Paraíso</option>
                        <option value="Francisco Morazán">Francisco Morazán</option>
                        <option value="Gracias a Dios">Gracias a Dios</option>
                        <option value="Intibucá">Intibucá</option>
                        <option value="Islas de la Bahía">Islas de la Bahía</option>
                        <option value="La Paz">La Paz</option>
                        <option value="Lempira">Lempira</option>
                        <option value="Ocotepeque">Ocotepeque</option>
                        <option value="Olancho">Olancho</option>
                        <option value="Santa Bárbara">Santa Bárbara</option>
                        <option value="Valle">Valle</option>
                        <option value="Yoro">Yoro</option>  
                      </select>
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