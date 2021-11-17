@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Reporte de Pedidos PDF</h1>
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
<form action="{!!route('pedidoDiaExportPdf')!!}" method="GET">
    @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Fecha Única</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fecha">Fecha en especifico</label>
                             <input class="form-control" name="fecha" placeholder="Seleccione Fecha" type="date" data-date-format="aaaa/mm/dd" id="fecha">
                        </div>
    
                      </div>
                     
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info active"><i class="fas fa-file-export"></i> Exportar</button>     
                  </div>
              </div>
              <!-- /.card -->
        </div>

    </div>
</div>
</form>
<form action="{!!route('pedidoRangoExportPdf')!!}" method="GET">
    @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Rango de Fecha (90 días max.)</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fecha_inicial">Rango de Fecha (de:)</label>
                            <input class="form-control" id="fecha_inicial" name="fecha_inicial" value="" type="date" data-date-format="aaaa/mm/dd" id="fecha">
                        </div>

                        <div class="form-group">
                            <label for="fecha_final">(a:)</label>
                            <input class="form-control" id="fecha_final" name="fecha_final" value="" type="date" data-date-format="aaaa/mm/dd" id="fecha">
                       </div>
                      </div>
                    
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info active"><i class="fas fa-file-export"></i> Exportar</button>     
                  </div>
              </div>
              <!-- /.card -->
        </div>

    </div>
</div>
</form>

@endsection