<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use App\Models\User\assignedLeads;
use Illuminate\Support\Facades\Auth;
// Use App\Notifications\LeadAssignedSmsNotification;
use App\Notifications\LeadAssignedNotification;
use Twilio\Rest\Client;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        $users = User::all();
        return view('admin.leads.index', compact('partners', 'users'));
    }

    public function create()
    {
        return view('admin.leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:partners',
            'phone' => 'nullable',
            'course' => 'nullable',
            'message' => 'nullable',
            'type' => 'nullable',
            'assigned_user_id' => 'nullable|exists:users,id'
        ]);

        Partner::create($request->all());
        return redirect()->route('partner.list')->with('success', 'Lead created successfully');
    }

    // public function assignLead(Request $request, $id)
    // {
    //     $request->validate([
    //         'assigned_user_id' => 'required|exists:users,id',
    //     ]);
    //     $lead = Partner::findOrFail($id);
    //     $lead->assigned_user_id = $request->assigned_user_id;
    //     $lead->save();
    //     // Get assigned user details
    //     $assignedUser = User::find($request->assigned_user_id);
    //     $phoneNumber = $assignedUser->phone;
    //     if (!str_starts_with($phoneNumber, '+')) {
    //         $phoneNumber = '+91' . $phoneNumber; // Change +91 to your country's code
    //     }
    //     // Twilio credentials
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilioNumber = env('TWILIO_PHONE');
    //     // Twilio Client
    //     $client = new Client($sid, $token);
    //     // SMS Message
    //     $message = "Hello {$assignedUser->name}, a new lead has been assigned to you.\n" .
    //             "Lead Name: {$lead->name}\n" .
    //             "Email: {$lead->email}\n" .
    //             "Phone: {$lead->phone}";
    //     // Send SMS
    //     $client->messages->create(
    //         $phoneNumber, // Ensure this is in E.164 format
    //         [
    //             'from' => $twilioNumber,
    //             'body' => $message,
    //         ]
    //     );
    //     return redirect()->back()->with('success', 'Lead assigned and SMS sent.');
    // }

    // public function assignLead(Request $request, $id)
    // {
    //     $request->validate([
    //         'assigned_user_id' => 'required|exists:users,id',
    //     ]);

    //     $lead = Partner::findOrFail($id);
    //     $isReassigned = $lead->assigned_user_id !== null; // Check if it was already assigned

    //     $lead->assigned_user_id = $request->assigned_user_id;
    //     $lead->save();

    //     // Get newly assigned user
    //     $assignedUser = User::find($request->assigned_user_id);

    //     // Notify the assigned user via database notification
    //     $assignedUser->notify(new LeadAssignedNotification($lead));

    //     // Send WhatsApp notification
    //     $this->sendWhatsAppNotification($assignedUser, $lead, $isReassigned);

    //     return redirect()->back()->with('success', 'Lead assigned successfully.');
    // }

    // private function sendWhatsAppNotification($user, $lead, $isReassigned)
    // {
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilioWhatsAppFrom = env('TWILIO_WHATSAPP_FROM');

    //     $client = new Client($sid, $token);

    //     $actionText = $isReassigned ? "📢 *Lead Reassigned*" : "✅ *New Lead Assigned*";

    //     $message = "$actionText\n\n"
    //              . "👤 *Lead Name:* {$lead->name}\n"
    //              . "📧 *Email:* {$lead->email}\n"
    //              . "📞 *Phone:* {$lead->phone}\n"
    //              . "🎯 *Course:* {$lead->course}\n"
    //              . "🔗 Check your dashboard: " . url('/leads');

    //     $recipient = $user->phone;
    //     if (!str_starts_with($recipient, 'whatsapp:')) {
    //         $recipient = "whatsapp:" . $recipient;
    //     }

    //     try {
    //         $client->messages->create($recipient, [
    //             'from' => $twilioWhatsAppFrom,
    //             'body' => $message,
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error("Twilio WhatsApp Error: " . $e->getMessage());
    //     }
    // }

    public function assignLead(Request $request, $id)
    {
        $request->validate([
            'assigned_user_id' => 'required|exists:users,id',
        ]);

        $lead = Partner::findOrFail($id);
        $isReassigned = $lead->assigned_user_id ? true : false; // Check if lead was previously assigned
        $lead->assigned_user_id = $request->assigned_user_id;
        $lead->save();

        // Get assigned user details
        $assignedUser = User::find($request->assigned_user_id);
        $phoneNumber = $assignedUser->phone;

        // Ensure phone number format (add country code if missing)
        if (!str_starts_with($phoneNumber, '+')) {
            $phoneNumber = '+91' . $phoneNumber; // Change +91 to your country code
        }

        // Twilio credentials
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE');
        $twilioWhatsAppFrom = env('TWILIO_WHATSAPP_FROM');
        // Initialize Twilio Client
        $client = new Client($sid, $token);
        // Message content
        $actionText = $isReassigned ? "📢 *Lead Reassigned*" : "✅ *New Lead Assigned*";
        $message = "$actionText\n\n"
            . "👤 *Lead Name:* {$lead->name}\n"
            . "📧 *Email:* {$lead->email}\n"
            . "📞 *Phone:* {$lead->phone}\n"
            . "🎯 *Course:* {$lead->course}\n"
            . "🔗 Check your dashboard: " . url('/leads');

        try {
            // 📩 Send SMS
            $client->messages->create(
                $phoneNumber,
                [
                    'from' => $twilioNumber,
                    'body' => strip_tags($message), // Remove any special formatting for SMS
                ]
            );
            // 💬 Send WhatsApp message
            $client->messages->create(
                "whatsapp:" . $phoneNumber,
                [
                    'from' => $twilioWhatsAppFrom,
                    'body' => $message,
                ]
            );

            \Log::info("Lead Notification Sent to {$assignedUser->name} via SMS & WhatsApp");
        } catch (\Exception $e) {
            \Log::error("Twilio Error: " . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Lead assigned and notifications sent.');
    }

    // public function assignedLead(){
    // $userId = Auth::id(); 
    // $partners = Partner::where('assigned_user_id', $userId)->orderBy('id', 'desc')->get();
    // $users = User::all();
    //     return view('admin.leads.assignedLeads',compact('partners','users'));
    // }
    public function assignedLead() {
        $user = auth()->user();
        $assignedLeads = $user->assignedLeads()->count();
        $respondedLeads = $user->respondedLeads()->count();
        $userId = Auth::id(); 
        
        // Fetch leads assigned to the logged-in user
        $partners = Partner::where('assigned_user_id', $userId)->orderBy('id', 'desc')->get();
        $users = User::all(); // Fetch all users for assigning/reassigning leads
    
        // Count the status from notes where status is 'Responded'
        $interestedLeads = Partner::where('assigned_user_id', $userId)
            ->where('status', 'Responded')
            ->where('notes', 'LIKE', '%Interested%')
            ->count();
    
        $notInterestedLeads = Partner::where('assigned_user_id', $userId)
            ->where('status', 'Responded')
            ->where('notes', 'LIKE', '%Not Interested%')
            ->count();
    
        $followUpLeads = Partner::where('assigned_user_id', $userId)
            ->where('status', 'Responded')
            ->where('notes', 'LIKE', '%Follow-up Required%')
            ->count();

        $convertedLeads = Partner::where('assigned_user_id', $userId)
        ->where('status', 'Responded')
        ->where('notes', 'LIKE', '%Converted%')
        ->count();
    
        return view('admin.leads.assignedLeads', compact(
            'partners', 'users', 'assignedLeads', 'respondedLeads', 
            'interestedLeads', 'notInterestedLeads', 'followUpLeads','convertedLeads'
        ));
    }
    
    
    public function updateNotes(Request $request, $id)
    {
        $request->validate([
            'notes' => 'nullable|in:Interested,Not Interested,Follow-up Required,Converted,Invalid Lead',
        ]);
    
        $lead = Partner::findOrFail($id);
        $lead->notes = $request->notes;
        $lead->save();
    
        return redirect()->back()->with('success', 'Note updated successfully.');
    }
    

    public function respondLead($id)
    {
        $lead = Partner::findOrFail($id);
        $lead->status = 'responded';
        $lead->save();

        return redirect()->back()->with('success', 'Lead marked as responded.');
    }

}
