<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRegisterRequest;
use App\Http\Requests\PostOtpRequest;

class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
      return auth()->user()->hasVerifiedPhone()
                        ? redirect()->route('dashboard')
                        : view('auth.register_step2');
    }

    public function postForm(PostRegisterRequest $request)
    {
        if (auth()->user()->phone == request('phone')) {
            flash('This mobile number already exists')->error();
            return back();
        } else {
            auth()->user()->update($request->only(['phone', 'company_name', 'designation', 'address']));
            return $this->sendOtp();
        }
    }

    public function otp()
    {
      return auth()->user()->hasVerifiedPhone()  ? redirect()->route('dashboard') : view('auth.otp');
    }

    public function verifyOtp(PostOtpRequest $request)
    {
        if (request('otp') == session('rand_no')) {
            $data['phone_verified_at'] = now();
            auth()->user()->update($data);
            return redirect()->route('dashboard');
        } else {
            flash('You have entered wrong OTP.')->error();
            return redirect()->route('otp');
        }
    }

    public function resendOtp()
    {
      return $this->sendOtp();
    }

    private function sendOtp()
    {
        // Sender id
        $senderID = "FSTSMS";

        // Recipient mobile number

        if (!empty(request('phone'))) {
            $recipient_no = request()->phone;
        } else {
            $recipient_no = auth()->user()->phone;
        }


        // Generate random verification code
        $rand_no = rand(1000, 9999);

        session()->put('rand_no', $rand_no);

        // Send otp to user via SMS
        $message = 'Dear ' . auth()->user()->full_name . ', OTP for mobile number verification is ' . $rand_no . '. Thanks';

        return redirect()->route('otp');

      //  return $this->send_sms($senderID, $recipient_no, $message);
    }

    private function send_sms($senderID, $recipient_no, $message)
    {

        //$requestURL = "http://sms.messageindia.in/v2/sendSMS?username=srajmukut&message=".$message ."&sendername=JBMALL&smstype=TRANS&numbers=". $recipient_no . "&apikey=0a1cb274-b362-4ec7-ab3e-75ac67548f8e&peid=1501543420000027466&templateid=1507162149129703334";

        // Request parameters array

        // $requestParams = array(
        //     "sender_id" => $senderID,
        //     "message" => $message,
        //     "language" => "english",
        //     "route" => "p",
        //     "numbers" => $recipient_no,
        //     "flash" => "1"
        // );

        $postData = array(
            "username" =>'srajmukut',
            "message" => $message,
            "smstype" => "TRANS",
            "numbers" => $recipient_no,
            "apikey" => env('SMS_AUTH_KEY'),
            "templateid" => "1507162149129703334"
        );

        $ch = curl_init();
    curl_setopt_array($ch, array(
       CURLOPT_URL => "http://sms.messageindia.in/v2/sendSMS?",
       CURLOPT_RETURNTRANSFER =>true,
       CURLOPT_POST => true,
       CURLOPT_POSTFIELDS => $postData,
    ));

    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

   $output = curl_exec($ch);

   if(curl_errno($ch)){
        echo 'error :'. curl_error($ch);
   }
   curl_close($ch);

   dd($ch);


        // // API call
        // $curl = curl_init();
        // // Merge API url and parameters
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "http://sms.messageindia.in/v2/sendSMS",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => json_encode($requestParams),

        // ));
        // //  Return curl response

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     return view('auth.otp');
        // }
    }
}
