<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\Testmail;

class Website extends Controller
{
    public function index()
    {
        $message = 'thasnfklsadfsdf';
        $data = [
            'name'=> 'Janardan',
            'data'=> 'Test Mail',
        ];
        $use['to'] = 'janardanjoshi7775@gmail.com';

        // die;
        $send = Mail::send('mail', $data, function($mesages) use ($use){
            $mesages->from('testsmtpjsongara@gmail.com');
            $mesages->to($use['to']);
            $mesages->subject('title is here');
           
        });
        Log::debug(Mail::failures());
        Log::debug('done emailing');


        // Mail::to('testsmtpjsongara@gmail.com')->send(new Testmail($data));
        // return 'email send';

        // $to_name = "janardan";
        // $to_email = "janardan.joshi@codilya.com";

        // $data = array('name'=>"Janardan", 'body' => "A test mail");

        // Mail::send('mail', $data, function($message) use ($to_name, $to_email) 
        // {
        //     $message->to($to_email, $to_name)->subject("Laravel Test Mail");
        //     $message->from("testsmtpjsongara@gmail.com","Test Mail");
        // });
        
        // $email = ['testsmtpjsongara@gmail.com'];

        // Mail::to($email)->send(new Testmail($email));
        // return new JsonResponse(
        //     [
        //         'success' => true, 
        //         'message' => "Thank you for subscribing to our email, please check your inbox"
        //     ], 
        //     200
        // );

        // $to_email = "mailaddress@mail.com";

        // Mail::to($to_email)->send(new Testmail);
        
        // return view('mail');
    }
    function sendmail(){
        // $message = 'thasnfklsadfsdf';
        $data = [
            'name'=> 'Janardan',
            'data'=> 'Test Mail',
            'subject' =>'welcom',
        ];
        $send = Mail::send('mail', $data, function($message) use ($data) {
            $message->from('testsmtpjsongara@gmail.com');
            $message->to('janardanjoshi7775@gmail.com');
            $message->subject($data['subject']);
        });
        echo "<pre>";
        echo $send;
        print_r($send);
        die('he');
        return "<p> Success! Your E-mail has been sent.</p>";
    }
}