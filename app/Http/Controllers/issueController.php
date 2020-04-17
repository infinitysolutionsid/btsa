<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
        return back()->with('sukses', 'good');
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
