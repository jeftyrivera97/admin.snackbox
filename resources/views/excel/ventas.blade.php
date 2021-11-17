<table>
  <thead>
  <tr>
      <th>ID Venta</th>
      <th>Fecha</th>
      <th>Cliente</th>
      <th>Código Pedido</th>
      <th>Fecha Pedido</th>
      <th>Descuento</th>
      <th>Total</th>
  </tr>
  </thead>
  <tbody>
  @foreach($ventas as $venta)
      <tr>
          <td>{{ $venta->id_venta }}</td>
          <td>{{ $venta->fecha }}</td>
          <td>{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</td>
          <td>{{ $venta->pedido->codigo_pedido }}</td>
          <td>{{ $venta->pedido->fecha_pedido }}</td>
          <td>{{ $venta->descuento}}</td>
          <td>{{ $venta->total}}</td>          
      </tr>
  @endforeach
  </tbody>
</table>

