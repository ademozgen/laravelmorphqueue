<?php

namespace App\Listeners;

use App\Providers\NewUserRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\WelcomeNewUser;
class NewUserRegisteredListener implements ShouldQueue
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
     * @param  NewUserRegisteredEvent  $event
     * @return void
     */
    public function handle($event)
    {
         Mail::to($event->user->email)->send(new WelcomeNewUser());
    }
}
