<?php

namespace App\Http\Controllers;

use \App\candidateDB;

use Illuminate\Http\Request;

class candidateController extends Controller
{
    public function index()
    {
        $interviewer = \App\candidateDB::all();
        return view('candidate.index', ['interviewer' => $interviewer]);
    }
    public function step2()
    {
        return view('candidate.form2');
    }
    public function proses(Request $request)
    {

        $interviewer = new \App\candidateDB();
        $interviewer->candidate_id;
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
        $interviewer->info_lowongan = $request->info_lowongan;
        $interviewer->req_datein = $request->req_datein;
        $interviewer->income = $request->income;

        if ($request->hasFile('profilephoto')) {
            $request->file('profilephoto')->move('file/img/', $request->file('profilephoto')->getClientOriginalName());
            $interviewer->profilephoto = $request->file('profilephoto')->getClientOriginalName();
        }
        if ($request->hasFile('file_cv')) {
            $request->file('file_cv')->move('file/doc/', $request->file('file_cv')->getClientOriginalName());
            $interviewer->filecv = $request->file('file_cv')->getClientOriginalName();
        }

        $interviewer->save();
        return view('candidate.form2');
    }
    public function managements()
    {
        $candidate = \App\candidateDB::all();
        return view('candidate.managements', ['candidate' => $candidate]);
    }
}
