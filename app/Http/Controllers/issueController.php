<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use \App\IRModel;
use App\Mail\successMakeNewIssue;

class issueController extends Controller
{
    public function index()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->get();
        return view('issue.index', ['issueData' => $issueData]);
    }
    public function addnewissue(Request $request)
    {
        $issueData = new \App\IRModel();
        $issueData->id;
        $issueData->nama_lengkap = $request->nama_lengkap;
        $issueData->tujuan = $request->tujuan;
        $issueData->kendala = $request->kendala;
        $issueData->status = 'Belum Selesai';
        $issueData->approve = 'unApproved';
        $issueData->tanggal = date('Y-m-d');
        $issueData->jam = date('H:i:s');
        $issueData->created_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();
        // SEND EMAIL
        // \Mail::raw('New Ticket Submited #' . $issueData->id, function ($message) use ($issueData) {
        //     $message->to('support@btsa.co.id', 'BTSA Logistics Care.');
        //     $message->subject('[Ticket#' . $issueData->id . '] Important: Issue report have been made to our IR Portal.');
        // });
        // \Mail::raw('Halo divisi ' . $request->tujuan . ',\r\n Kita menerima laporan isu di program atau sistem kita. Yang melapor adalah user \r\n ' . $request->nama_lengkap . '\r\n Mohon dibantu untuk laporan #' . $issueData->id . ' yang berisi \r\n' . $request->kendala . '\r\n Terima kasih atas perhatiannya ya. \r\n Original Complain from "' . $request->nama_lengkap . '"', function ($message) use ($issueData) {
        //     $message->to('john@johndoe.com', 'John Doe');
        //     $message->subject('[Ticket#' . $issueData->id . '] Important: Issue report have been made to our IR Portal.');
        // });

        \Mail::to('support@btsa.co.id')->send(new successMakeNewIssue($issueData));
        return back()->with('sukses', 'Tiket IR kamu berhasil dibuat. Tunggu respon dari pihak ' . $request->tujuan . ' ya. Terima kasih.');
    }
    public function itCheck()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->where('issuereport_tb.status', '=', 'Belum Selesai')
            ->where('issuereport_tb.approve', '!=', 'unApproved')
            ->where('issuereport_tb.tujuan', '=', auth()->user()->role)
            ->get();
        return view('issue.itCheck', ['issueData' => $issueData]);
    }
    public function itSolved()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->where('issuereport_tb.status', '=', 'Selesai')
            ->where('issuereport_tb.tujuan', '=', auth()->user()->role)
            ->get();
        return view('issue.itSolved', ['issueData' => $issueData]);
    }
    public function headCheck()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->where('issuereport_tb.approve', '=', 'unApproved')
            ->get();
        return view('issue.headCheck', ['issueData' => $issueData]);
    }
    public function selesai(Request $request, $id)
    {
        $issueData = \App\IRModel::find($id);
        $issueData->update($request->all());
        $issueData->solusi = $request->solusi;
        $issueData->status = 'Selesai';
        $issueData->tanggal = date('Y-m-d');
        $issueData->jam = date('H:i:s');
        $issueData->updated_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();


        return back()->with('sukses', 'Laporan gangguan anda telah diselesaikan.');
    }
    public function sementara(Request $request, $id)
    {
        $issueData = \App\IRModel::find($id);
        $issueData->update($request->all());
        $issueData->status = 'Belum Selesai';
        $issueData->updated_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();
        return back()->with('sukses', 'Laporan anda ditunda lagi. Yahh....! Bersabar ya..');
    }
    public function batal(Request $request, $id)
    {
        $issueData = \App\IRModel::find($id);
        $issueData->update($request->all());
        $issueData->status = 'Batal';
        $issueData->updated_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();
        return back()->with('sukses', 'Laporan gangguan anda telah dibatalkan karena alasan yang kuat. Hubungi IT/PU untuk mempertanyakan hal tsb. Terima kasih.');
    }
    public function approve(Request $request, $id)
    {
        $issueData = \App\IRModel::find($id);
        $issueData->update($request->all());
        $issueData->approve = auth()->user()->nama_lengkap;
        $issueData->updated_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();
        return back()->with('sukses', 'Terima kasih udah approve. Sekarang laporannya akan diteruskan ke pihak terkait.');
    }
    public function abort(Request $request, $id)
    {
        $issueData = \App\IRModel::find($id);
        $issueData->update($request->all());
        $issueData->approve = 'unApproved';
        $issueData->updated_by = auth()->user()->nama_lengkap;
        $issueData->logIP = $request->getClientIp();
        $issueData->save();
        return back()->with('sukses', 'Yahh ga diapprove ya?');
    }
}
