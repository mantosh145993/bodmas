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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class RazorpayPaymentController extends Controller
{
    protected $menuHelper;

    public function __construct(MenuHelper $menuHelper)
    {
        $this->menuHelper = $menuHelper;
    }

    public function initiatePayment(Request $request, $id)
    {
        try {
            // Decrypt the package ID
            $decryptedId = Crypt::decryptString($id);
            $package = PaidPackage::findOrFail($decryptedId);
            $installmentType = $request->get('installment');
            switch($installmentType){
                case 'basic':
                    $paymentType = "Final Booking";
                    $packageType = "Basic";
                    $base_amount = $package->basic_fee;
                    $amount = (int)$package->basic_fee_with_gst;
                break;
                case 'premium':
                    $paymentType = "Final Booking";
                    $packageType = "Premium";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->premium_fee_with_gst ;
                break;
                case 'premium-1':
                    $paymentType = "First Installment";
                    $packageType = "Premium";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->first_installment_with_gst ;
                break;
                case 'premium-2':
                    $packageType = "Premium";
                    $paymentType = "Second Installment";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->second_installment_with_gst ;
                break;
                case 'nri':
                    $packageType = "NRI";
                    $paymentType = "Final Booking";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->nri_fee_with_gst;
                break;
                case 'nri-1':
                    $packageType = "NRI";
                    $paymentType = "First Installment";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->first_installment_with_gst_premium ;
                break;
                case 'nri-2':
                    $packageType = "NRI";
                    $paymentType = "Second Installment";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->second_installment_with_gst_premium;
                break;
            }
            // dd($amount);
            // Razorpay configuration
            $key = 'rzp_test_WkATe7eC5OTHbN'; // Your Razorpay Key
            $secret = 'wFWC1ZiNJSokqkt9hjrpTEtE'; // Your Razorpay Secret
            $api = new Api($key, $secret);
            $orderData = [
                'receipt' => (string) rand(1000, 9999), // Random receipt ID
                'amount' => $amount* 100, // Amount in paise (converted from INR)
                'currency' => 'INR',
                'payment_capture' => 1, // Auto-capture enabled
            ];
            
            // Create the order using Razorpay API
            $razorpayOrder = $api->order->create($orderData);
            $menus = $this->menuHelper->getMenu();
            // dd( $orderData);
            return view('payment', [
                'package' => $package,
                'razorpayOrder' => $razorpayOrder,
                'menus' => $menus,
                'key' => $key, 
                'base_amount' =>$base_amount,
                'amount' => $amount,
                'paymentType' => $paymentType,
                'packageType' => $packageType
            ]);
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid or tampered ID.'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // public function initiatePayment(Request $request, $id)
    // {
    //     try {
    //         $decryptedId = Crypt::decryptString($id);
    //         $package = PaidPackage::findOrFail($decryptedId);
    //         $key = 'rzp_test_WkATe7eC5OTHbN';
    //         $secret = 'wFWC1ZiNJSokqkt9hjrpTEtE';
    //         $api = new Api($key, $secret);
    //         $orderData = [
    //             'receipt' => (string) rand(1000, 9999),
    //             'amount' => $package->total_price * 100, // amount in paise
    //             'currency' => 'INR',
    //             'payment_capture' => 1, // auto-capture
    //         ];
    //         $razorpayOrder = $api->order->create($orderData);
    //         $menus = $this->menuHelper->getMenu();
    //         return view('payment', [
    //             'package' => $package,
    //             'razorpayOrder' => $razorpayOrder,
    //             'menus' => $menus,
    //             'key' => $key,
    //         ]);
    //     } catch (DecryptException $e) {
    //         return response()->json(['error' => 'Invalid or tampered ID.'], 400);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
    public function processPayment(Request $request)
    {
        // dd($request->all());
        $key = 'rzp_test_WkATe7eC5OTHbN';
        $secret = 'wFWC1ZiNJSokqkt9hjrpTEtE';
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
            $api->utility->verifyPaymentSignature($attributes); // Verify the payment signature
          
            // If payment is verified successfully
            $payment = Payment::create([
                'product_name' => $request->input('product_name'),
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'price' => $request->input('price'), 
                'vendor_gst' => $request->input('vendor_gst'),
                'amount' => $request->input('amount'), 
                'gst' => $request->input('gst'), 
                'gst_amount' => $request->input('gst_amount'), 
                'customer_name' => $request->input('name'),
                'number' => $request->input('number'),
                'payment_status' => 'success'
            ]);
            $encryptedId = Crypt::encryptString($payment->id);
            return redirect()->route('payment.success', ['id' => $encryptedId]);
        } catch (\Exception $e) {
            Payment::create([
                'product_name' => $request->input('product_name'),
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'price' => $request->input('price'), 
                'vendor_gst' => $request->input('vendor_gst'),
                'amount' => $request->input('amount'), 
                'gst' => $request->input('gst'), 
                'gst_amount' => $request->input('gst_amount'), 
                'customer_name' => $request->input('name'),
                'number' => $request->input('number'),
                'payment_status' => 'success'
            ]);
            return redirect()->route('payment.failed');
        }
    }

    public function verifyPayment(Request $request)
    {
        $key = 'rzp_test_WkATe7eC5OTHbN';
        $secret = 'wFWC1ZiNJSokqkt9hjrpTEtE';
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
        $menus = $this->menuHelper->getMenu();
        return view('success', compact('menus', 'payment'));
    }

    public function failed()
    {
        $menus = $this->menuHelper->getMenu();
        return view('failur', compact('menus'));
    }
}
