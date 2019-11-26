<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class candidateController extends Controller
{
    public function index()
    {
        return view('candidate.index');
    }
    public function proses(Request $request)
    {

        $interviewer = new \App\candidateDB();
        $interviewer->appliedposition = $request->appliedposition;
        $interviewer->nama_lengkap = $request->nama_lengkap;
        $interviewer->nama_panggilan = $request->nama_panggilan;
        $interviewer->tempat_lahir = $request->tempat_lahir;
        $interviewer->tanggal_lahir = $request->tanggal_lahir;
        $interviewer->NoKtp = $request->NoKtp;
        $interviewer->NoSim = $request->NoSim;
        $interviewer->NoNpwp = $request->NoNpwp;
        $interviewer->NoBpjs = $request->NoBpjs;
        $interviewer->suku = $request->suku;
        $interviewer->agama = $request->agama;
        $interviewer->golongandarah = $request->golongandarah;
        $interviewer->anak_ke = $request->anak_ke;
        $interviewer->alamatKtp = $request->alamatKtp;
        $interviewer->alamatTinggal = $request->alamatTinggal;
        $interviewer->statusrumah = $request->statusrumah;
        $interviewer->email = $request->email;
        $interviewer->noHp = $request->noHp;
        $interviewer->created_by = $request->getClientIp();
        $interviewer->updated_by = $request->getClientIp();
        if ($request->hasFile('profilephoto')) {
            $request->file('profilephoto')->move('file/', $request->file('profilephoto')->getClientOriginalName());
            $interviewer->profilephoto = $request->file('profilephoto')->getClientOriginalName();
        }
        $interviewer->save();
        // dd($interviewer);
    }
}
