<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VidoView;

class ListenerVido
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
    public function handle(VidoView $event)
    {
        $this->updateViewer($event->video);
    }

    public function updateViewer($video)
    {
        $video->views = $video->views +1 ;
        $video->save();
    }

}
