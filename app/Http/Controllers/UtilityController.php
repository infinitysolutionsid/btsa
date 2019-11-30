<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\cityDB;
use \App\loker;
use \App\religionDB;
use \App\sukuDB;

class UtilityController extends Controller
{
    public function index()
    {
        $city = DB::table('city')
            ->select('city.*')
            ->get();
        $suku = DB::table('sukuIndonesia')
            ->select('sukuIndonesia.*')
            ->get();
        $agama = DB::table('religion')
            ->select('religion.*')
            ->get();
        $lowongan = DB::table('loker')
            ->select('loker.*')
            ->get();
        return view('utility.index', ['city' => $city, 'suku' => $suku, 'agama' => $agama, 'lowongan' => $lowongan]);
    }
    public function kotaaddnew(Request $request)
    {
        $kota = new \App\cityDB();
        $kota->city_name = $request->city_name;
        $kota->created_by = auth()->user()->nama_lengkap;
        $kota->updated_by = auth()->user()->nama_lengkap;
        $kota->save();
        return back()->with('sukseskota', 'Kota berhasil ditambahkan!');
    }
    public function sukuaddnew(Request $request)
    {
        $suku = new \App\sukuDB();
        $suku->nama_suku = $request->nama_suku;
        $suku->created_by = auth()->user()->nama_lengkap;
        $suku->updated_by = auth()->user()->nama_lengkap;
        $suku->save();
        return back()->with('suksessuku', 'Suku baru berhasil ditambahkan!');
    }
    public function agamaaddnew(Request $request)
    {
        $agamaID = new \App\religionDB();
        $agamaID->religion_name = $request->religion_name;
        $agamaID->created_by = auth()->user()->nama_lengkap;
        $agamaID->updated_by = auth()->user()->nama_lengkap;
        $agamaID->save();
        return back()->with('suksesagama', 'Agama baru berhasil ditambahkan!');
    }
    public function lowonganaddnew(Request $request)
    {
        $lokerID = new \App\loker();
        $lokerID->available_position = $request->available_position;
        $lokerID->created_by = auth()->user()->nama_lengkap;
        $lokerID->updated_by = auth()->user()->nama_lengkap;
        $lokerID->save();
        return back()->with('suksesloker', 'Posisi baru berhasil ditambahkan!');
    }
    public function deletekota($city_id)
    {
        $datakota = cityDB::find($city_id);

        if ($datakota) {
            if ($datakota->delete()) {

                DB::statement('ALTER TABLE city AUTO_INCREMENT = ' . (count(cityDB::all()) + 1) . ';');

                return back()->with('sukseskota', 'Kota berhasil dihapus');
            }
        }
    }
    public function deletesuku($nama_suku)
    {
        $datasuku = sukuDB::find($nama_suku);

        if ($datasuku) {
            if ($datasuku->delete()) {

                DB::statement('ALTER TABLE sukuIndonesia AUTO_INCREMENT = ' . (count(sukuDB::all()) + 1) . ';');

                return back()->with('suksessuku', 'Suku berhasil dihapus');
            }
        }
    }
    public function hapusagama($religion_id)
    {
        $dataagama = religionDB::find($religion_id);

        if ($dataagama) {
            if ($dataagama->delete()) {

                DB::statement('ALTER TABLE religion AUTO_INCREMENT = ' . (count(religionDB::all()) + 1) . ';');

                return back()->with('suksesagama', 'Agama berhasil dihapus');
            }
        }
    }
    public function deleteloker($loker_id)
    {
        $dataloker = loker::find($loker_id);

        if ($dataloker) {
            if ($dataloker->delete()) {

                DB::statement('ALTER TABLE loker AUTO_INCREMENT = ' . (count(loker::all()) + 1) . ';');

                return back()->with('suksesloker', 'Loker berhasil dihapus');
            }
        }
    }
}
