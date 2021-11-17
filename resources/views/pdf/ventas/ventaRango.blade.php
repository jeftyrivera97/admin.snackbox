<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Reporte de Ventas </title>
    <style>

      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #864040;
        color: white;
      }

      p,h1, h3{
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      }
   
      </style>
    <h1 style="text-align:center" class="display-4">REPORTE DE VENTAS</h1>
    <p><b>Fecha:</b> {{$hoy}}</p>
    <p><b>Empresa:</b> {{$empresa->descripcion}}      <b>R.T.N:</b>{{$empresa->codigo_empresa}}</p>     
    <p><b>Dirección:</b>{{$empresa->direccion}}</p>
    <p><b>Fecha Consulta:</b> {{$fechaInicial}} - {{$fechaFinal}}</p>
    <br>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <p><b>TOTAL en Ventas:</b> L. {{$total}} <p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="center" id="customers">
              <thead>
                <tr>
                  <th scope="col"> ID</th>
                  <th scope="col"> Fecha & Hora </th>
                  <th scope="col"> Pedido </th>
                  <th scope="col"> Cliente </th>
                  <th scope="col"> Estado </th>
                  <th scope="col"> Total </th>
                </tr>
            </thead>
            <tbody>   
              @foreach($ventas as $venta)
              <tr>
                <td> {{$venta->id_venta}} </td>
                <td> {{$venta->fecha}} </td>
                <td> {{$venta->pedido->codigo_pedido}} </td>
                <td> {{$venta->cliente->nombre}} {{$venta->cliente->nombre}} </td>
                <td> {{$venta->estado->descripcion}} </td>
                <td> L. {{$venta->total}} </td>
            </tr>
          @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>

  </body>
</html>
