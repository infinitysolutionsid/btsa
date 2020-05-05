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
        if (auth()->user()->role != 'hrd')
            $notice = DB::table('warningdb')
                ->join('users', 'warningdb.to', '=', 'users.id')
                ->where('warningdb.created_by', '=', auth()->user()->nama_lengkap)
                ->orWhere('warningdb.to', '=', auth()->user()->id)
                ->select('users.id', 'users.nama_lengkap', 'warningdb.*')
                ->get();
        elseif (auth()->user()->role == 'hrd')
            $notice = DB::table('warningdb')
                ->join('users', 'warningdb.to', '=', 'users.id')
                ->where('warningdb.approved_by', '=', 'approved')
                ->orWhere('warningdb.approved_by', '=', 'confirmed')
                ->select('users.id', 'users.nama_lengkap', 'warningdb.*')
                ->get();
        $headget = DB::table('users')
            ->Where('jabatan', '=', 'manager')
            ->get();
        $user = DB::table('users')
            ->where('jabatan', '=', 'staff')
            ->orderBy('users.nama_lengkap', 'ASC')
            ->select('users.nama_lengkap')
            ->get();
        // $headget = User::where('role', '=', 'head');
        return view('warning.index', ['headget' => $headget, 'user' => $user, 'notice' => $notice]);
        // dd($notice);
    }
    public function requestnew(Request $request)
    {
        $notice = new WarningDB();
        $notice->type = $request->type;
        $notice->from = auth()->user()->id;
        $notice->to = $request->to;
        $notice->approved_by = 'unapproved';
        $notice->confirmed_by = '0';
        $notice->employee = $request->employee;
        $notice->reason = $request->reason;
        $notice->bagian = 'user';
        $notice->created_by = auth()->user()->nama_lengkap;
        $notice->updated_by = auth()->user()->nama_lengkap;
        $notice->save();

        return back()->with('sukses', 'Surat peringatan/teguran kamu berhasil disimpan! Tinggal menunggu, surat kamu disetujui oleh atasan kamu atau tidak ya. Terima kasih. :)');
        // dd($notice);
    }
    public function approve(Request $request, $id)
    {
        $getd = WarningDB::find($id);
        $getd->update($request->all());
        $getd->approved_by = 'approved';
        $getd->updated_by = auth()->user()->nama_lengkap;
        $getd->save();
        return back()->with('sukses', 'Yes! Terima kasih ' . auth()->user()->nama_lengkap . ' sudah memberi izin.');
    }
    public function confirmed(Request $request, $id)
    {
        $getd = WarningDB::find($id);
        $getd->update($request->all());
        $getd->approved_by = 'confirmed';
        $getd->confirmed_by = auth()->user()->nama_lengkap;
        $getd->save();
        return back()->with('sukses', 'Siap! Terima kasih ya ' . auth()->user()->nama_lengkap . ' sudah konfirmasi');
    }
}
