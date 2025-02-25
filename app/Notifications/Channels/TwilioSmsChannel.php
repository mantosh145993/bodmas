<?php
namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class TwilioSmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toTwilioSms')) {
            return;
        }

        $message = $notification->toTwilioSms($notifiable);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE');

        $client = new Client($sid, $token);

        $client->messages->create(
            $notifiable->phone, // The recipient's phone number
            [
                'from' => $twilioNumber,
                'body' => $message,
            ]
        );
    }
}
