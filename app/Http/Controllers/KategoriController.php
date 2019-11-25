<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data_cat = \App\KategoriModel::all();
        $vessel = \App\VesselM::all();
        return view('kategori.index', ['data_cat' => $data_cat, 'vessel' => $vessel]);
    }
    public function delete($id)
    {
        $data_cat = KategoriModel::find($id);

        if ($data_cat) {
            if ($data_cat->delete()) {

                DB::statement('ALTER TABLE jadwalkapal AUTO_INCREMENT = ' . (count(KategoriModel::all()) + 1) . ';');

                return redirect('/jadwal')->with('sukses', 'Jadwal kapal has been successfully deleted!');
            }
        }
    }
    public function addnew(Request $request)
    {
        $data_cat = new \App\KategoriModel();
        $data_cat->kotaasal = $request->kotaasal;
        $data_cat->kotatujuan = $request->kotatujuan;
        $data_cat->vessel = $request->vessel;
        $data_cat->voy = $request->voy;
        $data_cat->closingdate = $request->closingdate;
        $data_cat->etd = $request->etd;
        $data_cat->eta = $request->eta;
        $data_cat->created_by = auth()->user()->nama_lengkap;
        $data_cat->updated_by = auth()->user()->nama_lengkap;
        // $data_cat->created_by = auth()->user()->fullname;
        // $data_cat->updated_by = auth()->user()->fullname;
        $data_cat->save();

        return redirect('/jadwal')->with('sukses', 'New data has succesfully added!');
        // dd($data_cat);
    }
    public function edit($id)
    {
        $data_cat = \App\KategoriModel::find($id);
        $jad_ves = DB::table('jadwalkapal')
            ->crossJoin('vessel')
            ->select('jadwalkapal.*', 'vessel.*')
            ->get();
        return view('kategori.edit', ['data_cat' => $data_cat, 'jad_ves' => $jad_ves]);
    }
    public function update(Request $request, $id)
    {
        $data_cat = \App\KategoriModel::find($id);
        $data_cat->update($request->all());
        $data_cat->updated_by = auth()->user()->nama_lengkap;
        $data_cat->save();

        return redirect('/jadwal')->with('sukses', 'Category data has been succesfully updated!');
    }
}
