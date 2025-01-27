<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\PaidPackage;
use App\Models\Payment;
use Dotenv\Dotenv;
use App\Helpers\MenuHelper;
use App\Models\Package;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Encryption\DecryptException;


class RazorpayPaymentController extends Controller
{
    protected $menuHelper;
    
    public function __construct(MenuHelper $menuHelper)
    {
        $this->menuHelper = $menuHelper;
    }

    // Paid Cutoff
    public function paidcutoff(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        if (!empty($input['razorpay_payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $response = $payment->capture(['amount' => $payment['amount']]);
                if ($response) {
                    // dd($response);
                    $paymentRecord = Payment::create([
                        'product_name' => $response->description ?? 'N/A', // Use description from response
                        'payment_id' => $response->id,
                        'order_id' => $response->order_id,
                        'product_id' => $request->cutoff_id,
                        'amount' => $response->amount / 100, // Convert to INR (from paise)
                        'payment_status' => $response->status,
                        'customer_name'=> $request->name,
                        'number' => $request->number
                    ]);
                    return redirect()->route('payment.success', Crypt::encryptString($paymentRecord->id));
                }
            } catch (\Exception $e) {
                Log::error('Razorpay Payment Error: ' . $e->getMessage());
                return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
            }
        }
        return redirect()->back()->with('error', 'Invalid payment details.');
    }
    
    // Paid Cutoff End

    // Paid Guidance

    public function initiatePayment(Request $request, $id)
    {
        try {
            // Decrypt the package ID
            $decryptedId = Crypt::decryptString($id);
            $package = PaidPackage::findOrFail($decryptedId);
            $installmentType = $request->get('installment');
            switch ($installmentType) {
                case 'basic':
                    $first_installment = '';
                    $second_installment = '';
                    $paymentType = "Final Booking";
                    $packageType = "Basic";
                    $base_amount = $package->basic_fee;
                    $amount = (int)$package->basic_fee_with_gst;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'premium':
                    $first_installment = '';
                    $second_installment = '';
                    $paymentType = "Final Booking";
                    $packageType = "Premium";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->premium_fee_with_gst;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'premium-1':
                    $paymentType = "First Installment";
                    $packageType = "Premium";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->first_installment_with_gst;
                    $first_installment = (int)$package->first_installment;
                    $second_installment = '';
                    $gst_amount = (int) $first_installment / 100 * 18;
                    break;
                case 'premium-2':
                    $packageType = "Premium";
                    $paymentType = "Second Installment";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->second_installment_with_gst;
                    $first_installment = '';
                    $second_installment = (int)$package->second_installment;
                    $gst_amount = (int) $second_installment / 100 * 18;
                    break;
                case 'nri':
                    $first_installment = '';
                    $second_installment = '';
                    $packageType = "NRI";
                    $paymentType = "Final Booking";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->nri_fee_with_gst;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'nri-1':
                    $packageType = "NRI";
                    $paymentType = "First Installment";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->first_installment_with_gst_premium;
                    $first_installment = (int)$package->first_installment_premium;
                    $second_installment = '';
                    $gst_amount = (int) $first_installment / 100 * 18;
                    break;
                case 'nri-2':
                    $packageType = "NRI";
                    $paymentType = "Second Installment";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->second_installment_with_gst_premium;
                    $first_installment = '';
                    $second_installment = (int)$package->second_installment_premium;
                    $gst_amount = (int) $second_installment / 100 * 18;
                    break;
            }
            $key = env('RAZORPAY_KEY');
            $secret = env('RAZORPAY_SECRET');
            $api = new Api($key, $secret);
            $orderData = [
                'receipt' => (string) rand(1000, 9999),
                'amount' => $amount*100,
                'currency' => 'INR',
                'payment_capture' => 1,
            ];
            // Create the order using Razorpay API
            $razorpayOrder = $api->order->create($orderData);
            $menus = $this->menuHelper->getMenu();
            return view('paymentRazorpay', [
                'razorpayOrder' => $razorpayOrder,
                'package' => $package,
                'menus' => $menus,
                'base_amount' => $base_amount,
                'paymentType' => $paymentType,
                'packageType' => $packageType,
                'gst_amount' => $gst_amount,
                'amount' => $amount,
                'first_installment' => $first_installment,
                'second_installment' => $second_installment,
            ]);
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid or tampered ID.'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function processPayment(Request $request)
    {
        $amount = intval(str_replace(',', '', $request->input('total_amount')));
        $package_type = $request->package_type;
        $package_name = $request->package_name;
        $base_price = intval(str_replace(',', '', $request->input('base_price')));
        $payment_term = $request->payment_term;
        $gst_rate = (int) $request->gst_rate;
        $gst_amount = intval(str_replace(',', '', $request->input('gst_amount')));
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $vendor_gst = $request->vendor_gst;
        $merchTxnId = $request->razorpay_payment_id;
    
        $key = env('RAZORPAY_KEY');
        $secret = env('RAZORPAY_SECRET');
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');
        $api = new Api($key, $secret);
    
        $attributes = [
            'razorpay_order_id' => $orderId,
            'razorpay_payment_id' => $paymentId,
            'razorpay_signature' => $signature,
        ];
    
        try {
            // Verify the payment signature
            $api->utility->verifyPaymentSignature($attributes);
    
            // Save the payment record in the database
            $payment = Payment::create([
                'product_name' => $package_name,
                'payment_id' => $merchTxnId,
                'order_id' => $orderId,
                'price' => $base_price,
                'package_type' => $package_type,
                'payment_type' => $payment_term,
                'vendor_gst' => $vendor_gst,
                'amount' => $amount,
                'gst' => $gst_rate,
                'gst_amount' => $gst_amount,
                'customer_name' => $name,
                'cutomer_email' => $email,
                'number' => $mobile,
                'payment_status' => "success"
            ]);
    
            // Encrypt the payment ID
            $encryptedId = Crypt::encryptString($payment->id);
    
            // Return JSON response with success status and payment ID
            return response()->json([
                'status' => 'success',
                'message' => 'Payment processed successfully!',
                'payment_id' => $payment->id,
                'redirect_url' => route('payment.success', ['id' => $encryptedId]),
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors and return a failure response
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'redirect_url' => route('payment.failed'),
            ], 500);
        }
    }
    

    public function verifyPayment(Request $request)
    {
        $key = env('RAZORPAY_KEY');
        $secret = env('RAZORPAY_SECRET');
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $api = new Api($key, $secret);

        $attributes = [
            'razorpay_order_id' => $orderId,
            'razorpay_payment_id' => $paymentId,
            'razorpay_signature' => $signature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);
            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            return redirect()->route('payment.failed');
        }
    }

    public function success($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $payment = Payment::findOrFail($decryptedId);
        $cutOffData = Package::where('id', $payment->product_id)->first();
        $menus = $this->menuHelper->getMenu();
        return view('success', compact('menus', 'payment','cutOffData'));
    }

    public function failed()
    {
        $menus = $this->menuHelper->getMenu();
        return view('failur', compact('menus'));
    }

    // Paid Guidance End
}
