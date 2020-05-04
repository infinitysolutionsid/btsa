<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\WarningDB;

class WarningController extends Controller
{
    public function index()
    {
        $notice = WarningDB::all();
        $headget = DB::table('users')
            ->where('role', '=', 'head')
            ->orWhere('role', '=', 'it')
            ->get();
        $user = DB::table('users')
            ->where('role', '!=', 'head')
            ->select('users.nama_lengkap')
            ->get();
        // $headget = User::where('role', '=', 'head');
        return view('warning.index', ['headget' => $headget, 'user' => $user, 'notice' => $notice]);
    }
    public function requestnew(Request $request)
    {
        $notice = new WarningDB();
        $notice->type = $request->type;
        $notice->from = auth()->user()->id;
        $notice->to = $request->to;
        $notice->approved_by = '0';
        $notice->employee = $request->employee;
        $notice->reason = $request->reason;
        $notice->bagian = 'user';
        $notice->created_by = auth()->user()->nama_lengkap;
        $notice->updated_by = auth()->user()->nama_lengkap;
        $notice->save();

        return back()->with('sukses', 'Surat peringatan/teguran kamu berhasil disimpan! Tinggal menunggu, surat kamu disetujui oleh atasan kamu atau tidak ya. Terima kasih. :)');
        // dd($notice);
    }
}
