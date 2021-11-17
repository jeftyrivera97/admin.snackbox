@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Nueva Cuenta Bancaria</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{!! url('cuenta') !!}"  class="btn btn-warning active btn-sm"><i class="fas fa-backward"></i> Regresar</a></li>
      </ol>
    </div>
  </div>
</div>
@endsection 
@section('content')

<form action="/cuenta" method="POST"> 
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
                    <div class="form-group col-md-4">
                    <label for="banco">Entidad Bancaria</label>
                      <select name="banco" required  id="banco" name="banco" class="form-control input-rounded">
                        <option value="">--Selecione--</option>
                        <option value="Banco Atlantida">Banco Atlántida</option>
                        <option value="Banco Ficohsa">Banco Ficohsa</option>
                        <option value="BAC Credomatic">BAC Credomatic</option>
                        <option value="Banpais">Banpais</option>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Numero de Cuenta</label>
                      <input type="number" class="form-control input-rounded"  required placeholder="" id="codigo_cuenta"  name="codigo_cuenta">
                      </div>

                      <div class="form-group col-md-4">
                        <label>Nombre Titular</label>
                        <input type="text" class="form-control input-rounded"  required placeholder="" id="titular"  name="titular">
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