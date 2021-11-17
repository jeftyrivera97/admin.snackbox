<?php

namespace App\Listeners;

use App\Notifications\PedidoNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PedidoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $users = User::findOrFail($event->pedido->cliente->id_usuario);
        //$users->notify(new PedidoNotification($event));
        Notification::send($users, new PedidoNotification($event->pedido)); 
    }
}
