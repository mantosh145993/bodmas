<?php

namespace App\Http\Controllers;

use App\Models\PaidPackage;
use App\Models\Payment;
use Razorpay\Api\Api;
use Session;
use Exception;
use Dotenv\Dotenv;
use App\Helpers\MenuHelper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayController extends Controller
{
    protected $menuHelper;

    public function __construct(MenuHelper $menuHelper)
    {
        $this->menuHelper = $menuHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // set your values in below function
    // public function index()
    // {
    // $merchTxnId = uniqid('txn_', true);
    // $amount = 10.00;
    // $product_id = "NSE";
    // $date = date('Y-m-d H:i:s'); // current date
    // $login = env('ATOM_LOGIN');
    // $password = env('ATOM_PASSWORD');
    // $encRequestKey = env('ATOM_ENC_KEY');
    // $decResponseKey = env('ATOM_DEC_KEY');
    // $api_url = env('ATOM_API_URL');
    // $user_email = "xyz@abc.com";
    // $user_contact_number = "8888888888";
    // $return_url = route('response');
    // // $return_url = "https://www.atomtech.in/aipay-tool/response.php"; 

    // $payData = array(
    //     'login' => $login,
    //     'password' => $password,
    //     'amount' => $amount,
    //     'prod_id' => $product_id,
    //     'txnId' => $merchTxnId,
    //     'date' => $date,
    //     'encKey' => $encRequestKey,
    //     'decKey' => $decResponseKey,
    //     'payUrl' => $api_url,
    //     'email' => $user_email,
    //     'mobile' => $user_contact_number,
    //     'txnCurrency' => 'INR',
    //     'return_url' => $return_url,
    //     'udf1' => "",  // optional
    //     'udf2' => "",  // optional 
    //     'udf3' => "",  // optional
    //     'udf4' => "",  // optional
    //     'udf5' => ""   // optional
    // );
    // //  dd($payData);
    //     // dd($return_url);
    //     $atomTokenId = $this->createTokenId($payData);
    //     return view('atompay')->with('data', $payData)
    //         ->with('atomTokenId', $atomTokenId);
    // }

    public function initiatePayment(Request $request, $id)
    {
        try {
            // Decrypt the package ID
            $decryptedId = Crypt::decryptString($id);
            $package = PaidPackage::findOrFail($decryptedId);
            $installmentType = $request->get('installment');
            switch ($installmentType) {
                case 'basic':
                    $paymentType = "Final Booking";
                    $packageType = "Basic";
                    $base_amount = $package->basic_fee;
                    $amount = (int)$package->basic_fee_with_gst;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'premium':
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
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'premium-2':
                    $packageType = "Premium";
                    $paymentType = "Second Installment";
                    $base_amount = $package->premium_fee;
                    $amount = (int)$package->second_installment_with_gst;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'nri':
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
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
                case 'nri-2':
                    $packageType = "NRI";
                    $paymentType = "Second Installment";
                    $base_amount = $package->nri_fee;
                    $amount = (int)$package->second_installment_with_gst_premium;
                    $gst_amount = (int) $base_amount / 100 * 18;
                    break;
            }
            // dd($amount);

            $menus = $this->menuHelper->getMenu();
            // dd( $orderData);
            return view('payment', [
                'package' => $package,
                'menus' => $menus,
                'base_amount' => $base_amount,
                'amount' => $amount,
                'paymentType' => $paymentType,
                'packageType' => $packageType,
                'gst_amount' => $gst_amount
            ]);
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid or tampered ID.'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        // dd($request->all());
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
        try {
            $merchTxnId = uniqid('txn_', true);
            $product_id = "NSE";
            $date = date('Y-m-d H:i:s'); // current date
            $login = env('ATOM_LOGIN');
            $password = env('ATOM_PASSWORD');
            $encRequestKey = env('ATOM_ENC_KEY');
            $decResponseKey = env('ATOM_DEC_KEY');
            $api_url = env('ATOM_API_URL');
            $user_email = $email;
            $user_contact_number = $mobile;
            $return_url = route('response');
            $payData = array(
                'login' => $login,
                'password' => $password,
                'amount' => $amount,
                'prod_id' => $product_id,
                'txnId' => $merchTxnId,
                'date' => $date,
                'encKey' => $encRequestKey,
                'decKey' => $decResponseKey,
                'payUrl' => $api_url,
                'email' => $user_email,
                'mobile' => $user_contact_number,
                'txnCurrency' => 'INR',
                'return_url' => $return_url,
                'udf1' => "",  // optional
                'udf2' => "",  // optional 
                'udf3' => "",  // optional
                'udf4' => "",  // optional
                'udf5' => ""   // optional
            );
            // Razorpay configuration
            $atomTokenId = $this->createTokenId($payData);
            if ($atomTokenId) {
                Payment::create([
                    'product_name' => $package_name,
                    'payment_id' => $merchTxnId,
                    'order_id' => $payData['prod_id'],
                    'price' => $base_price,
                    'package_type' => $package_type,
                    'payment_type' => $payment_term,
                    'vendor_gst' => $vendor_gst,
                    'amount' => $amount,
                    'gst' => $gst_rate,
                    'gst_amount' => $gst_amount,
                    'customer_name' => $name,
                    'cutomer_email' => $email,
                    'number' => $mobile
                ]);
            }else{
                return redirect()->route('payment.failed');
            }
            $menus = $this->menuHelper->getMenu();
            // dd( $payData);
            return view('at', [
                'menus' => $menus,
                'atomTokenId' => $atomTokenId,
                'data' => $payData

            ]);
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid or tampered ID.'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleResponse(Request $request)
    {
        $data = $_POST['encData'];
        // Decrypt the data
        $decData = $this->decrypt($data, '75AEF0FA1B94B3C10D4F5B268F757F11', '75AEF0FA1B94B3C10D4F5B268F757F11');
        // Decode the JSON data into an associative array
        $jsonData = json_decode($decData, true);
        // Extract relevant details from the response data
        $txnId = $jsonData['payInstrument']['merchDetails']['merchTxnId'];  // Transaction ID
        $txnDate = $jsonData['payInstrument']['payDetails']['txnInitDate'];  // Transaction Date
        $paymentStatus = $jsonData['payInstrument']['responseDetails']['message'];  // Payment status
        $paymentMethod = isset($jsonData['payInstrument']['payModeSpecificData']['subChannel'][0])
            ? $jsonData['payInstrument']['payModeSpecificData']['subChannel'][0]
            : 'Unknown';  // Payment method (e.g., 'NB')
        // Find the payment record using the transaction ID
        $payment = Payment::where('payment_id', $txnId)->first();
        // If payment record exists, update the relevant fields
        if ($payment) {
            $payment->payment_status = $paymentStatus;  // Update payment status
            $payment->txn_date = $txnDate;  // Update transaction date
            $payment->payment_method = $paymentMethod;  // Update payment method
            $payment->save();
            $menus = $this->menuHelper->getMenu();
            return view('success', compact('menus', 'payment'));
        } else {
            return response()->json(['message' => 'Payment not found for the given Transaction ID.'], 404);
        }
    }

    //do not change anything in below function
    public function createTokenId($data)
    {
        $jsondata = '{
                "payInstrument": {
                    "headDetails": {
                        "version": "OTSv1.1",      
                        "api": "AUTH",  
                        "platform": "FLASH"	
                    },
                    "merchDetails": {
                        "merchId": "' . $data['login'] . '",
                        "userId": "",
                        "password": "' . $data['password'] . '",
                        "merchTxnId": "' . $data['txnId'] . '",      
                        "merchTxnDate": "' . $data['date'] . '"
                    },
                    "payDetails": {
                        "amount": "' . $data['amount'] . '",
                        "product": "' . $data['prod_id'] . '",
                        "custAccNo": "213232323",
                        "txnCurrency": "' . $data['txnCurrency'] . '"
                    },	
                    "custDetails": {
                        "custEmail": "' . $data['email'] . '",
                        "custMobile": "' . $data['mobile'] . '"
                    },
                    "extras": {
                        "udf1": "' . $data['udf1'] . '",  
                        "udf2": "' . $data['udf2'] . '",  
                        "udf3": "' . $data['udf3'] . '", 
                        "udf4": "' . $data['udf4'] . '",  
                        "udf5": "' . $data['udf5'] . '" 
                    }
                }  
            }';

        $encData = $this->encrypt($jsondata, $data['encKey'], $data['encKey']);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $data['payUrl'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_CAINFO => dirname(__FILE__) . '/cacert.pem', //added in Controllers folder
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "encData=" . $encData . "&merchId=" . $data['login'],
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $atomTokenId = null;
        $response = curl_exec($curl);
        $getresp = explode("&", $response);
        $encresp = substr($getresp[1], strpos($getresp[1], "=") + 1);
        $decData = $this->decrypt($encresp, $data['decKey'], $data['decKey']);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            echo "error = " . $error_msg;
        }
        if (isset($error_msg)) {
            echo "error = " . $error_msg;
        }
        curl_close($curl);
        $res = json_decode($decData, true);
        if ($res) {
            if ($res['responseDetails']['txnStatusCode'] == 'OTS0000') {
                $atomTokenId = $res['atomTokenId'];
            } else {
                echo "Error getting data";
                $atomTokenId = null;
            }
        }
        // dd($atomTokenId);
        return $atomTokenId;
    }

    //do not change anything in below function 
    public function encrypt($data, $salt, $key)
    {
        $method = "AES-256-CBC";
        $iv = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
        $chars = array_map("chr", $iv);
        $IVbytes = join($chars);
        $salt1 = mb_convert_encoding($salt, "UTF-8"); //Encoding to UTF-8
        $key1 = mb_convert_encoding($key, "UTF-8"); //Encoding to UTF-8
        $hash = openssl_pbkdf2($key1, $salt1, '256', '65536', 'sha512');
        $encrypted = openssl_encrypt($data, $method, $hash, OPENSSL_RAW_DATA, $IVbytes);
        return strtoupper(bin2hex($encrypted));
    }

    //do not change anything in below function
    public function decrypt($data, $salt, $key)
    {
        $dataEncypted = hex2bin($data);
        $method = "AES-256-CBC";
        $iv = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
        $chars = array_map("chr", $iv);
        $IVbytes = join($chars);
        $salt1 = mb_convert_encoding($salt, "UTF-8"); //Encoding to UTF-8
        $key1 = mb_convert_encoding($key, "UTF-8"); //Encoding to UTF-8
        $hash = openssl_pbkdf2($key1, $salt1, '256', '65536', 'sha512');
        $decrypted = openssl_decrypt($dataEncypted, $method, $hash, OPENSSL_RAW_DATA, $IVbytes);
        return $decrypted;
    }
}
