<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function index()
    {
        $issueData = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->orderBy('issuereport_tb.tanggal', 'DESC')
            ->orderBy('issuereport_tb.jam', 'DESC')
            ->get();
        $data_member = DB::table('users')
            ->select('users.*')
            ->get();
        $data_legal = DB::table('legality')
            ->select('legality.*')
            ->get();
        $vessel = DB::table('vessel')
            ->select('vessel.*')
            ->get();
        $irtotal = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalselesai = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Selesai')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalbselesai = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Belum Selesai')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalbatal = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Batal')
            ->select('issuereport_tb.*')
            ->get();
        $quote = DB::table('quote')
            ->where('quote.status', '=', 'Selesai')
            ->select('quote.*')
            ->orderBy('quote.updated_at', 'DESC')
            ->get();
        return view('dash.index', ['data_member' => $data_member, 'data_legal' => $data_legal, 'vessel' => $vessel, 'irtotalselesai' => $irtotalselesai, 'irtotal' => $irtotal, 'irtotalbselesai' => $irtotalbselesai, 'irtotalbatal' => $irtotalbatal, 'issueData' => $issueData, 'quote' => $quote]);
    }
}
