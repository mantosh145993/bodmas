<?php 
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class LeadAssignedNotification extends Notification
{
    use Queueable;

    protected $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function via($notifiable)
    {
        return ['database']; // Send to DB and WhatsApp
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "A new lead has been assigned: {$this->lead->name}",
            'lead_id' => $this->lead->id,
        ];
    }

    // Custom method for Twilio WhatsApp
    public function toTwilioWhatsApp($notifiable)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsAppFrom = env('TWILIO_WHATSAPP_FROM');

        $client = new Client($sid, $token);

        $message = "📢 *New Lead Assigned*\n\n"
                 . "👤 *Lead Name:* {$this->lead->name}\n"
                 . "📧 *Email:* {$this->lead->email}\n"
                 . "📞 *Phone:* {$this->lead->phone}\n"
                 . "🎯 *Course:* {$this->lead->course}\n"
                 . "🔗 Login to check: " . url('/leads');

        // Ensure the phone number is in WhatsApp format
        $recipient = $notifiable->phone;
        if (!str_starts_with($recipient, 'whatsapp:')) {
            $recipient = "whatsapp:" . $recipient;
        }

        $client->messages->create($recipient, [
            'from' => $twilioWhatsAppFrom,
            'body' => $message,
        ]);
    }
}
