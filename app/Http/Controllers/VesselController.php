<?php

namespace App\Http\Controllers;

use App\VesselM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VesselController extends Controller
{
    public function index()
    {
        $vessel_item = \App\VesselM::all();
        return view('vessel.index', ['vessel_item' => $vessel_item]);
    }
    public function delete($vessel_id)
    {
        $vessel_item = VesselM::find($vessel_id);

        if ($vessel_item) {
            if ($vessel_item->delete()) {

                DB::statement('ALTER TABLE vessel AUTO_INCREMENT = ' . (count(VesselM::all()) + 1) . ';');

                return redirect('/vessel')->with('sukses', 'Vessel Item has been successfully deleted!');
            }
        }
    }
    public function addnew(Request $request)
    {
        $data_cat = new \App\VesselM();
        $data_cat->vessel = $request->vessel;
        $data_cat->created_by = auth()->user()->nama_lengkap;
        $data_cat->updated_by = auth()->user()->nama_lengkap;
        // $data_cat->created_by = auth()->user()->fullname;
        // $data_cat->updated_by = auth()->user()->fullname;
        $data_cat->save();

        return redirect('/vessel')->with('sukses', 'New data has succesfully added!');
        // dd($data_cat);
    }
    public function edit($vessel_id)
    {
        $data_cat = \App\VesselM::find($vessel_id);
        return view('vessel.edit', ['data_cat' => $data_cat]);
    }
    public function update(Request $request, $vessel_id)
    {
        $data_cat = \App\VesselM::find($vessel_id);
        $data_cat->update($request->all());
        $data_cat->updated_by = auth()->user()->nama_lengkap;
        $data_cat->save();

        return redirect('/vessel')->with('sukses', 'Vessel data has been succesfully updated!');
    }
}
