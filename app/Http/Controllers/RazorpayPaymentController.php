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

class RazorpayPaymentController extends Controller
{
    protected $menuHelper;

    public function __construct(MenuHelper $menuHelper)
    {
        $this->menuHelper = $menuHelper;
    }

    public function initiatePayment(Request $request, $id)
    {
        // dd(env('RAZORPAY_KEY'));
        $key = 'rzp_test_WkATe7eC5OTHbN';
        $secret ='wFWC1ZiNJSokqkt9hjrpTEtE';
        $package = PaidPackage::findOrFail($id); // Get the package by ID
        $api = new Api($key, $secret);
        // dd($key);
        $orderData = [
            'receipt' => (string) rand(1000, 9999), // Cast the random integer to a string
            'amount'          => $package->total_price * 100, // amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1, // auto-capture
        ];

        $razorpayOrder = $api->order->create($orderData);
        $menus = $this->menuHelper->getMenu();
        // dd($razorpayOrder);
        // dd($package);
        return view('payment', [
            'package' => $package,
            'razorpayOrder' => $razorpayOrder,
            'menus' => $menus,
            'key' =>$key
        ]);
    }

    public function processPayment(Request $request)
    {
        // dd($request->all());
        $key = 'rzp_test_WkATe7eC5OTHbN';
        $secret ='wFWC1ZiNJSokqkt9hjrpTEtE';
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
            // dd('Success');
            // If payment is verified successfully
            $payment = Payment::create([
                'product_name' => $request->input('product_name'),
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'amount' => $request->input('amount'), // Assuming amount comes from Razorpay webhook or form
                'payment_status' => 'success'
            ]);
            return redirect()->route('payment.success', ['id' => $payment->id]);
        } catch (\Exception $e) {
            Payment::create([
                'product_name' => $request->input('product_name'),
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'amount' => $request->input('amount'),
                'payment_status' => 'failed'
            ]);
            return redirect()->route('payment.failed');
        }
    }

    public function verifyPayment(Request $request)
    {
        $key = 'rzp_test_WkATe7eC5OTHbN';
        $secret ='wFWC1ZiNJSokqkt9hjrpTEtE';
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $api = new Api($key , $secret);

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
        $payment = Payment::findOrFail($id);
        $menus = $this->menuHelper->getMenu();
        return view('success', compact('menus', 'payment'));
    }

    public function failed()
    {
        $menus = $this->menuHelper->getMenu();
        return view('failur', compact('menus'));
    }
}
