
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
         backgroundColor: ["#3e95cd","#c45850", "#8e5ea2","#3cba9f","#e8c3b9"],
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
 type: 'bar',
 data: {
     labels: ingresosA,
     datasets: [{
         label: 'Ingresos',
         data: valoresA,
         backgroundColor: ["#3e95cd","#c45850", "#8e5ea2","#3cba9f","#e8c3b9"],
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
         backgroundColor: ["#c45850","#8e5ea2","#c45850","#e8c3b9","#e8c3b9"],
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

