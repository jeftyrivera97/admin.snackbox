@extends('layouts.app')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Notificaciones</h1>
  </div>
</div>
@endsection 
@section('content')
<div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Notificaciones sin leer</div>
                    <div class="card-body">
                      @if (Auth::check())
                      @forelse ($pedidoNotificaciones as $notification)
                      <div class="alert alert-default-warning">
                      El cliente <Strong> {{ $notification->data['cliente_nombre']  }} </Strong>
                      <Strong> {{ $notification->data['cliente_apellido']  }} </Strong> con código de cliente #:
                      <Strong> {{ $notification->data['codigo_cliente']  }} </Strong> ha realizado un nuevo pedido
                      pendiente de confirmación con código #:
                      <Strong> {{ $notification->data['pedido']  }} </Strong><br>
                        <p class="mr-2 float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</p><br>
                        <button type="submit" class="mark-as-read btn btn-sm btn-dark" data-id="{{ $notification->id }}">Ver</button>
                      </div>
                      @if ($loop->last)
                        <a href="#" id="mark-all">Marcar como leído</a>
                          
                      @endif        

                      @empty
                      No hay notificaciones nuevas                
                      @endforelse
                                  
                      @endif
                                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>        
@endsection


@section('scripts')
<script>
  function sendMarkRequest(id = null){
    return $.ajax("{{ route('markNotificationView') }}", {
      method: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        id
      }
    });
  }
  $(function(){
    $('.mark-as-read').click(function(){
      let request = sendMarkRequest($(this).data('id'));
      request.done(() => {
        $(this).parents('div.alert').remove();
        location.href ="{{ route('pedido-pendiente') }}";
      });
    });
    $('#mark-all').click(function(){
      let request = sendMarkRequest();
      request.done(() => {
        $('div.alert').remove();
        location.reload();
      })
    });
  });
</script>
@endsection