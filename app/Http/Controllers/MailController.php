<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;



class MailController extends Controller
{
    public function index()
    {

        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp'
        ];

        $email = "baihakitanjung12@gmail.com";

        try {
            // Mail::to( $email)->send(new MyTestMail($details));
            dispatch(new SendEmailJob($email, $details));
        } catch (\Throwable $th) {
            throw $th;
        }


        return 'Email sent successfully';
    }
}
