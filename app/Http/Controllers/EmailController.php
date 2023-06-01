<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $data['title'] = 'Send Email';
        return view('email.index', $data);
    }

    public function send(Request $request)
    {
        $email_tujuan = $request->input('email_tujuan');
        $subject = $request->input('subject');
        $pesan = $request->input('pesan');

        $details = [
            'title' => $subject,
            'body' => $pesan
        ];

        $sendEmail = Mail::to($email_tujuan)->send(new TestMail($details));

        return redirect('/email')->with('success', 'Email Berhasil Dikirim');
    }
}
