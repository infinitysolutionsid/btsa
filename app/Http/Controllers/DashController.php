<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != ['hrd', 'umum', 'it'])
            $issueData = DB::table('issuereport_tb')
                ->join('users', 'issuereport_tb.nama_lengkap', '=', 'users.nama_lengkap')
                ->select('issuereport_tb.*', 'users.nama_lengkap', 'users.profilephoto')
                ->orderBy('issuereport_tb.created_at', 'DESC')
                ->get();
        else
            $issueData = DB::table('issuereport_tb')
                ->join('users', 'issuereport_tb.nama_lengkap', '=', 'users.nama_lengkap')
                ->select('issuereport_tb.*', 'users.nama_lengkap', 'users.profilephoto')
                ->orderBy('issuereport_tb.created_at', 'DESC')
                ->where('issuereport_tb.tujuan', '=', auth()->user()->role)
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
            ->limit(1)
            ->inRandomOrder()
            ->get();
        $quoteds = DB::table('quote')
            ->where('quote.status', '=', 'Selesai')
            ->select('quote.*')
            ->get();
        $quotedash = DB::table('quote')
            ->join('users', 'quote.created_by', '=', 'users.nama_lengkap')
            ->where('quote.status', '=', 'loading')
            ->select('quote.*', 'users.profilephoto')
            ->orderByRaw('quote.updated_at', 'DESC')
            ->get();
        $warningget = DB::table('warningdb')
            ->where('warningdb.approved_by', '=', 'unapproved')
            ->get();
        return view('dash.index', ['data_member' => $data_member, 'data_legal' => $data_legal, 'vessel' => $vessel, 'irtotalselesai' => $irtotalselesai, 'irtotal' => $irtotal, 'irtotalbselesai' => $irtotalbselesai, 'irtotalbatal' => $irtotalbatal, 'issueData' => $issueData, 'quote' => $quote, 'quotedash' => $quotedash, 'quoteds' => $quoteds, 'warningget' => $warningget]);
        // dd(Auth::user());
        // print_r(Auth::user());
    }
}
