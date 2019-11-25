<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


class DashboardController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function ernodata()
    {
        return view('home.404');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function sendEmail(Request $request)
    {
        $subject = "Pesan baru dari " . $request->input('name');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $emailadd = $request->input('email');
        $messages = $request->input('messages');

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.starwhisper.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@starwhisper.id';
            $mail->Password = 'LibrA21101998';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Siapa yg mengirim email
            $mail->setFrom($emailadd);

            // Siapa yang akan menerima email
            $mail->addAddress('support@starwhisper.id', 'SUPPORT DEPARTMENT STARWHISPER');

            // Ke siapa kita akan balas emailnya
            $mail->addReplyTo($emailadd, $name);

            // Contentnnya
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $messages;
            $mail->AltBody = $messages;

            $mail->send();

            $request->session()->flash('sukses', 'Thank you for sending us an email');
            return redirect('/contact');
        } catch (Exception $e) {
            echo 'Message could not be sent';
            echo 'Mail error: ' . $mail->ErrorInfo;
        }
    }
}
