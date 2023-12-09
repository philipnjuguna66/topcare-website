<?php

namespace App\Listeners;


use App\Events\LeadCreatedEvent;

use App\Utils\TelegramBot;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;



class LeadCreatedListener implements ShouldQueue
{
    use  InteractsWithQueue;


    /**
     * Handle the event.
     *
     * @param LeadCreatedEvent $event
     * @return void
     */
    public function handle(LeadCreatedEvent $event)
    {


       $response = Http::post('https://topcarelands.co.ke/api/v1/crm/create', [
            'phone_number' => $event->phone,
            'source' => "website",
        ]);



       // (new TelegramBot())->sendMessage($event->message);


    }


}
