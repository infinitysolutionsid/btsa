<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MemberModel;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $data_member = DB::table('users')
            ->select('users.*')
            ->get();
        return view('member.index', ['data_member' => $data_member]);
    }
    public function addnewmember(Request $request)
    {
        $data_member = new \App\MemberModel;
        $data_member->nama_lengkap = $request->nama_lengkap;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = $request->role;
        $data_member->status = 'inactive';
        $data_member->password = Hash::make($request->password);
        $data_member->remember_token = str_random(50);
        $data_member->created_by = auth()->user()->nama_lengkap;
        $data_member->save();

        return redirect('/member')->with('sukses', 'New member data has been succesfully added!');
    }
    public function registered(Request $request)
    {
        $data_member = new \App\MemberModel;
        $data_member->nama_lengkap = $request->nama_lengkap;
        $data_member->username = $request->username;
        $data_member->email = $request->email;
        $data_member->role = $request->role;
        $data_member->status = 'inactive';
        $data_member->password = Hash::make($request->password);
        $data_member->remember_token = str_random(50);
        $data_member->created_by = 'Guest.';
        $data_member->save();

        return back()->with('sukses', 'Akun anda telah berhasil diajukan. Hubungi pihak managemen IT anda untuk menyetujui ajuan daftar anggota anda. Dan tunggu akan email anda untuk informasi username dan password anda');
    }
    public function delete($id)
    {
        $data_member = MemberModel::find($id);

        if ($data_member) {
            if ($data_member->delete()) {

                DB::statement('ALTER TABLE users AUTO_INCREMENT = ' . (count(MemberModel::all()) + 1) . ';');

                return back()->with('sukses', 'Member has been successfully deleted!');
            }
        }
    }
    public function edit($id)
    {
        $data_member = \App\MemberModel::find($id);
        return view('member.edit', ['data_member' => $data_member]);
    }
    public function update(Request $request, $id)
    {
        $data_member = \App\MemberModel::find($id);
        $data_member->update($request->all());
        $data_member->password = $request->password;
        $data_member->remember_token = str_random(50);
        $data_member->updated_by = auth()->user()->nama_lengkap;
        $data_member->created_by = auth()->user()->nama_lengkap;
        $data_member->save();
        return back()->with('sukses', 'Member data has been successfully updated!');
    }
}
