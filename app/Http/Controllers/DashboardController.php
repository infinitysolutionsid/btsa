<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

use Illuminate\Support\Facades\DB;
use App\Album;
use App\AlbumPhoto;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    public function index()
    {
        return view('webpage.index');
    }
    public function tentangkami()
    {
        return view('webpage.tentangkami');
    }
    public function blog()
    {
        return view('webpage.blog');
    }
    public function galeri()
    {
        $album = DB::table('albums')
            // ->join('album_photos', 'albums.id','=', 'album_photos.album_id')
            ->orderBy('albums.created_at', 'DESC')
            ->select('albums.*')
            ->get();
        foreach ($album as $item => $list) {
            $album[$item]->photo = DB::table('album_photos')
                ->where('album_photos.album_id', $list->id)
                ->get();
        }
        return view('webpage.galeri', ['album' => $album]);
    }
    public function karir()
    {
        return view('webpage.karir');
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
    public function traceview()
    {
        // session()->flush();
        return view('webpage.trace');
    }
    public function traceresult(Request $request)
    {
        $getQ = Input::get('trackid');
        // dd($getQ);
        $result = DB::table('track_orders')
            ->join('track_reports', 'track_orders.order_id', '=', 'track_reports.order_id')
            ->where('track_orders.order_id', '=', $getQ)
            ->select('track_orders.*', 'track_reports.*', 'track_reports.order_id as trackorderId')
            ->orderBy('track_reports.updated_at', 'DESC')
            ->get()->groupBy('order_id');
        $results = DB::table('track_orders')
            ->join('track_reports', 'track_orders.order_id', '=', 'track_reports.order_id')
            ->where('track_orders.order_id', '=', $getQ)
            ->select('track_orders.*', 'track_reports.*', 'track_reports.order_id as trackorderId')
            ->orderBy('track_reports.updated_at', 'DESC')
            ->get();

        return view('webpage.traceresult', ['result' => $result, 'results' => $results]);
        // dd($results);
    }
}
