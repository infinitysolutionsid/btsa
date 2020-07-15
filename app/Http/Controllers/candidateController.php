<?php

namespace App\Http\Controllers;

use \App\candidateDB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;
use App\cityDB;
use App\sukuDB;
use App\religionDB;
use App\loker;
use App\provinces;
use App\domisili;
use App\kecamatan;
use App\kelurahan;

class candidateController extends Controller
{
    public function index()
    {
        $interviewer = candidateDB::all();
        $kota = cityDB::all();
        $suku = sukuDB::all();
        $agama = religionDB::all();
        $loker = loker::all();
        $provinces = provinces::all();
        $domisili = domisili::all();
        $kecamatan = kecamatan::all();
        $kelurahan = kelurahan::all();
        return view('candidate.index', ['interviewer' => $interviewer, 'kota' => $kota, 'suku' => $suku, 'agama' => $agama, 'loker' => $loker, 'domisili' => $domisili, 'provinces' => $provinces, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
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
        $interviewer->pendidikan = $request->pendidikan;
        $interviewer->kota_domisili = $request->kota_domisili;
        $interviewer->kelamin = $request->gender;
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
            $request->file('profilephoto')->move('file/img/' . $request->nama_lengkap, $request->file('profilephoto')->getClientOriginalName());
            $interviewer->profilephoto = $request->file('profilephoto')->getClientOriginalName();
        }
        if ($request->hasFile('file_cv')) {
            $request->file('file_cv')->move('file/doc/' . $request->nama_lengkap, $request->file('file_cv')->getClientOriginalName());
            $interviewer->filecv = $request->file('file_cv')->getClientOriginalName();
        }
        if ($request->hasFile('ktpfile')) {
            $request->file('ktpfile')->move('file/doc/' . $request->nama_lengkap . '/ktp/', $request->file('ktpfile')->getClientOriginalName());
            $interviewer->ktpfile = $request->file('ktpfile')->getClientOriginalName();
        }
        if ($request->hasFile('simfile')) {
            $request->file('simfile')->move('file/doc/' . $request->nama_lengkap . '/sim/', $request->file('simfile')->getClientOriginalName());
            $interviewer->simfile = $request->file('simfile')->getClientOriginalName();
        }
        $interviewer->save();
        return view('candidate.form2');
    }
    public function managements()
    {
        // if (request()->has('available_position')) {
        //     $candidate = \App\loker::where('available_position', request('available_position'))->paginate(10);
        // } else {
        //     $candidate = DB::table('candidate')
        //         ->select('candidate.*')
        //         ->orderBy('candidate.created_at', 'DESC')
        //         ->paginate(10);
        // }
        if (request()->has('appliedposition')) {
            $candidate = \App\candidateDB::where('appliedposition', request('appliedposition'))->get()->appends('appliedposition', request('appliedposition'));
        } else {
            $candidate = DB::table('candidate')
                ->select('candidate.*')
                // ->where('candidate.appliedposition', '!=', '')

                ->get();
        }
        $filter_candidate = DB::table('loker')
            ->select('loker.available_position')
            ->get();
        $agama = DB::table('religion')
            ->select('religion.religion_name')
            ->get();
        $suku = DB::table('sukuIndonesia')
            ->select('sukuIndonesia.nama_suku')
            ->get();
        return view('candidate.managements', ['candidate' => $candidate, 'filter_candidate' => $filter_candidate, 'agama' => $agama, 'suku' => $suku]);
    }
    public function search(Request $request, candidateDB $candidatedb)
    {

        $position = $request->position;
        $pendidikan = $request->pendidikan;
        $gender = $request->gender;
        $agama = $request->agama;
        $suku = $request->suku;

        // search for candidate position
        if ($request->has('position')) {
            if ($request->has('pendidikan')) {
                $candidate = $candidatedb->where('appliedposition', $request->input('position'))
                    ->where('pendidikan', $request->input('pendidikan'))
                    ->get();
            }
            // search for gender
            if ($request->has('gender')) {
                $candidate = $candidatedb->where('appliedposition', $request->input('position'))
                    ->where('kelamin', $request->input('gender'))
                    ->get();
            }
            // search for agama
            if ($request->has('agama')) {
                $candidate = $candidatedb->where('appliedposition', $request->input('position'))
                    ->where('agama', $request->input('agama'))
                    ->get();
            }
            // search for suku
            if ($request->has('suku')) {
                $candidate = $candidatedb->where('appliedposition', $request->input('position'))
                    ->where('suku', $request->input('suku'))
                    ->get();
            }
            $candidate = $candidatedb->where('appliedposition', $request->input('position'))->get();
        }
        return view('candidate.results', ['candidate' => $candidate, 'position' => $position, 'pendidikan' => $pendidikan, 'gender' => $gender, 'agama' => $agama, 'suku' => $suku]);
        // var_dump($candidate);
        // die();
    }
    public function interviewed()
    {
        if (request()->has('appliedposition')) {
            $candidate = \App\candidateDB::where('appliedposition', request('appliedposition'))->paginate(10)->appends('appliedposition', request('appliedposition'));
        } else {
            $candidate = DB::table('candidate')
                ->where('candidate.statusinterview', '=', 'interviewed')
                ->select('candidate.*')
                ->orderBy('candidate.created_at', 'DESC')
                ->paginate(10);
        }
        $filter_candidate = DB::table('loker')
            ->select('loker.*')
            ->get();
        return view('candidate.interviewed', ['candidate' => $candidate, 'filter_candidate' => $filter_candidate]);
    }
    public function deletecandidate($candidate_id)
    {
        $data_cnd = candidateDB::find($candidate_id);

        if ($data_cnd) {
            if ($data_cnd->delete()) {

                DB::statement('ALTER TABLE candidate AUTO_INCREMENT = ' . (count(candidateDB::all()) + 1) . ';');

                return back()->with('sukses', 'Candidate has been successfully deleted!');
            }
        }
    }
    public function updatecandidate($candidate_id)
    {
        $cnd = \App\candidateDB::find($candidate_id);
        $cnd->statusinterview = 'interviewed';
        $cnd->save();

        return redirect('/candidate/managements')->with('sukses', 'Candidate sudah diupdate ke status sudah datang interview.');
    }
}
