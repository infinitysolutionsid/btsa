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

        $issueData->save();
        return back()->with('sukses', 'good');
    }
    public function itCheck()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->get();
        return view('issue.itCheck', ['issueData' => $issueData]);
    }
    public function headCheck()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->get();
        return view('issue.headCheck', ['issueData' => $issueData]);
    }
}
