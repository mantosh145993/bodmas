<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PhonePayController extends Controller
{


    public function index()
    {
        return view('phonePay');
    }



    public function submitPaymentForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required',
        ], [
            'amount.required' => 'Amount is required',
        ]);
    
        $amount = $request->input('amount');
        $name = $request->input('name');
    
        if (!empty($name) && !empty($amount)) {
            // Define credentials and API configuration
            $merchantId = 'M22XQK0HMKM4X';
            $apiKey = 'd227f160-63a1-4c63-af21-f321b15056e3';
            $redirectUrl = route('confirm'); // URL to redirect after payment
            $order_id = uniqid(); // Generate unique order ID
    
            // Transaction data
            $transaction_data = [
                'merchantId' => $merchantId,
                'merchantTransactionId' => $order_id,
                'merchantUserId' => $order_id,
                'amount' => $amount * 100, // Convert amount to paise
                'redirectUrl' => $redirectUrl,
                'redirectMode' => 'POST',
                'callbackUrl' => $redirectUrl,
                'paymentInstrument' => [
                    'type' => 'PAY_PAGE',
                ],
            ];
    
            // Encode transaction data to JSON
            $encode = json_encode($transaction_data);
            $payloadMain = base64_encode($encode);
            $salt_index = 1; // Key index
            $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    
            // Generate X-VERIFY header
            $sha256 = hash("sha256", $payload);
            $final_x_header = $sha256 . '###' . $salt_index;
            $requestPayload = json_encode(['request' => $payloadMain]);
    
            // Initialize cURL
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.phonepe.com/apis/hermes", // Use sandbox URL
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $requestPayload,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-VERIFY: " . $final_x_header,
                    "accept: application/json",
                ],
            ]);
    
            // Execute cURL request
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl); // Close cURL
    
            if ($err) {
                return response()->json(['error' => "cURL Error: " . $err], 500);
            } else {
                $res = json_decode($response);
    
                // Handle response and redirect to payment page if successful
                if (isset($res->code) && $res->code === 'PAYMENT_INITIATED') {
                    $payUrl = $res->data->instrumentResponse->redirectInfo->url;
                    return redirect()->away($payUrl);
                } else {
                    // Log error response for debugging
                    \Log::error('PhonePe API Error', ['response' => $response]);
                    return response()->json(['error' => 'ERROR: ' . ($res->message ?? 'Unknown error')], 500);
                }
            }
        } else {
            return response()->json(['error' => 'Invalid input: Name or Amount missing'], 400);
        }
    }
    

    public function confirmPayment(Request $request)
    {
dd($request->all());
        if ($request->code == 'PAYMENT_SUCCESS') {
            $transactionId = $request->transactionId;
            $merchantId = $request->merchantId;
            $providerReferenceId = $request->providerReferenceId;
            $merchantOrderId = $request->merchantOrderId;
            $checksum = $request->checksum;
            $status = $request->code;

            //Transaction completed, You can add transaction details into database


            $data = [
                'providerReferenceId' => $providerReferenceId,
                'checksum' => $checksum,

            ];
            if ($merchantOrderId != '') {
                $data['merchantOrderId'] = $merchantOrderId;
            }

            // Payment::where('transaction_id', $transactionId)->update($data);

            return view('confirm_payment', compact('providerReferenceId', 'transactionId'));
        } else {

            //HANDLE YOUR ERROR MESSAGE HERE
            dd('ERROR : ' . $request->code . ', Please Try Again Later.');
        }
    }
}
