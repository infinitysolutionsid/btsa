<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\itemModel;

class ItemController extends Controller
{
    //
    public function index()
    {
        $data_item = \App\itemModel::paginate(5);
        return view('item.index', ['data_item' => $data_item]);
    }
    public function addnewitem(Request $request)
    {
        $data_item = new \App\itemModel();
        $data_item->legal_name = $request->legal_name;
        $data_item->file =  $request->file;
        $data_item->downloads += 1;
        $data_item->created_by = auth()->user()->nama_lengkap;
        $data_item->updated_by = auth()->user()->nama_lengkap;
        $data_item->save();

        return redirect('/legal')->with('sukses', 'New data has succesfully added!');
        // dd($data_item);
    }
    public function delete($legal_id)
    {
        $item = itemModel::find($legal_id);

        if ($item) {
            if ($item->delete()) {

                DB::statement('ALTER TABLE legality AUTO_INCREMENT = ' . (count(itemModel::all()) + 1) . ';');

                return redirect('/legal')->with('sukses', 'Items has been successfully deleted!');
            }
        }
    }
    public function edit($legal_id)
    {
        $data_item = \App\itemModel::find($legal_id);
        return view('item/edit', ['data_item' => $data_item]);
    }
    public function update(Request $request, $legal_id)
    {
        $data_item = \App\itemModel::find($legal_id);
        $data_item->update($request->all());
        $data_item->updated_by = auth()->user()->nama_lengkap;
        $data_item->save();

        return redirect('/legal')->with('sukses', 'Item data has been succesfully updated!');
    }
}
