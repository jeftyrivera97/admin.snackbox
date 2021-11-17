<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Reporte de Pedidos </title>
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
    <h1 style="text-align:center" class="display-4">REPORTE DE PEDIDOS</h1>
    <p><b>Fecha:</b> {{$hoy}}</p>
    <p><b>Empresa:</b> {{$empresa->descripcion}}      <b>R.T.N:</b>{{$empresa->codigo_empresa}}</p>     
    <p><b>Dirección:</b>{{$empresa->direccion}}</p>
    <p><b>Fecha Consulta:</b> {{$fecha}}</p>
    <br>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <p><b>TOTAL en Pedidos s/n cancelar:</b> L. {{$total}} <p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="center" id="customers">
              <thead>
                <tr>
                  <th scope="col"> ID</th>
                  <th scope="col"> Fecha & Hora </th>
                  <th scope="col"> Código Pedido </th>
                  <th scope="col"> Cliente </th>
                  <th scope="col"> Estado </th>
                  <th scope="col"> Total </th>
                </tr>
            </thead>
            <tbody>   
              @foreach($pedidos as $pedido)
              <tr>
                <td> {{$pedido->id_pedido}} </td>
                <td> {{$pedido->fecha_pedido}} </td>
                <td> {{$pedido->codigo_pedido}} </td>
                <td> {{$pedido->cliente->nombre}} {{$pedido->cliente->nombre}} </td>
                <td> {{$pedido->estado->descripcion}} </td>
                <td> L. {{$pedido->total}} </td>
            </tr>
          @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>

  </body>
</html>
