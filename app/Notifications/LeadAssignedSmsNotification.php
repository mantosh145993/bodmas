<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\TwilioSmsChannel;

class LeadAssignedSmsNotification extends Notification
{
    use Queueable;

    protected $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function via($notifiable)
    {
        return [TwilioSmsChannel::class];
    }

    public function toTwilioSms($notifiable)
    {
        return "Hello {$notifiable->name}, a new lead has been assigned to you.\n" .
               "Lead Name: {$this->lead->name}\n" .
               "Email: {$this->lead->email}\n" .
               "Phone: {$this->lead->phone}";
    }
}
