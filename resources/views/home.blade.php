@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Decoraciones GS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        
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
        <span class="info-box-icon bg-success elevation-1"> <i class="fas fa-hand-holding-usd"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Ventas</span>
          <span class="info-box-number">
            L. {{$ventas}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1">  <i class="fas fa-clipboard-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pedidos por Confirmar</span>
        <span class="info-box-number">{{$TpedidosConfirmar}} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pedidos en Proceso</span>
        <span class="info-box-number">{{$TpedidosProceso}} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Clientes</span>
        <span class="info-box-number">{{$Tclientes}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
  <div class="row col-12">
    <div class="col-md-4">
      <!-- AREA CHART -->
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title"><b>Ventas Semanal</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="ingresos" width="500" height="400" ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-4">
      <!-- AREA CHART -->
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title"><b>Pedidos Semanal</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="pedidos" width="500" height="400" ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-4">
      <!-- AREA CHART -->
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title"><b>Ingresos Mensuales</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="ingresosAnual" width="500" height="400" ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>

  <script type="application/javascript">
    var ingresos=[];
    var valoresI=[];

    var ingresosA=[];
    var valoresA=[];
   
    var pedidos=[];
    var valoresP=[];

  $(document).ready(function() {
     $.ajax({
      url: "{{route ('ventasSemanal')}}",
      method:'POST',
      data:{
       "_token": "{{ csrf_token() }}",
      }
      }).done(function(res){
          var arregloI= JSON.parse(res);
  
          for(var x=0;x<arregloI.length; x++)
          {
            ingresos.push(arregloI[x].descripcion);
            valoresI.push(arregloI[x].total);
          }
          GraficaIngresosSemanal();
      
      });
        
        $.ajax({
        url: "{{route ('ventasAnual')}}",
        method:'POST',
        data:{
          "_token": "{{ csrf_token() }}",
        }
        }).done(function(res){
            var arregloI= JSON.parse(res);

            for(var x=0;x<arregloI.length; x++)
            {
              ingresosA.push(arregloI[x].descripcion);
              valoresA.push(arregloI[x].total);
            }
            GraficaIngresosAnual();
        
        });

      $.ajax({
      url: "{{route ('pedidosSemanal')}}",
      method:'POST',
      data:{
       "_token": "{{ csrf_token() }}",
      }
      }).done(function(res){
          var arregloI= JSON.parse(res);
  
          for(var x=0;x<arregloI.length; x++)
          {
            pedidos.push(arregloI[x].descripcion);
            valoresP.push(arregloI[x].total);
          }
          GraficaPedidosSemanal();
      
      });

  });
  function GraficaIngresosSemanal(){
   var ctx = document.getElementById('ingresos').getContext('2d');
   var myChart = new Chart(ctx, {
     type: 'bar',
     data: {
         labels: ingresos,
         datasets: [{
             label: 'Ingresos',
             data: valoresI,
             backgroundColor: ["#41B619","#41B619", "#117243","#116315","#4BB462"],
         }]
     },
     options: {
          legend: { display: false },
          title: {
            display: true,
            text: ''
          }
       
        
     }
  });
  }
  function GraficaIngresosAnual(){
   var ctx = document.getElementById('ingresosAnual').getContext('2d');
   var myChart = new Chart(ctx, {
    type: 'line',
   data: {
       labels: ingresosA,
       datasets: [{
           label: 'Ingresos Mensual',
           data: valoresA,
             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
           borderColor: "#0a043c",
           fill: false
         }]
     },
     options: {
          legend: { display: false },
          title: {
            display: true,
            text: ''
          }
       
        
     }
  });
  }

  function GraficaPedidosSemanal(){
   var ctx = document.getElementById('pedidos').getContext('2d');
   var myChart = new Chart(ctx, {
     type: 'doughnut',
     data: {
         labels: pedidos,
         datasets: [{
             label: '´Pedidos',
             data: valoresP,
             backgroundColor: ["#F85C50","#FFA96B","#FFE0BC","#FBE7B5","#FC9A40"],
         }]
     },
     options: {
          legend: { display: false },
          title: {
            display: true,
            text: ''
          }
       
        
     }
  });
  }
  


  </script>
  
@endsection
