<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use Illuminate\Support\Facades\DB;

use App\Album;
use App\AlbumPhoto;

class DashController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != ['hrd', 'umum', 'it'])
            $issueData = DB::table('issuereport_tb')
                ->join('users', 'issuereport_tb.nama_lengkap', '=', 'users.nama_lengkap')
                ->select('issuereport_tb.*', 'users.nama_lengkap', 'users.profilephoto')
                ->orderBy('issuereport_tb.created_at', 'DESC')
                ->get();
        else
            $issueData = DB::table('issuereport_tb')
                ->join('users', 'issuereport_tb.nama_lengkap', '=', 'users.nama_lengkap')
                ->select('issuereport_tb.*', 'users.nama_lengkap', 'users.profilephoto')
                ->orderBy('issuereport_tb.created_at', 'DESC')
                ->where('issuereport_tb.tujuan', '=', auth()->user()->role)
                ->get();
        $data_member = DB::table('users')
            ->select('users.*')
            ->get();
        $data_legal = DB::table('legality')
            ->select('legality.*')
            ->get();
        $vessel = DB::table('vessel')
            ->select('vessel.*')
            ->get();
        $irtotal = DB::table('issuereport_tb')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalselesai = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Selesai')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalbselesai = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Belum Selesai')
            ->select('issuereport_tb.*')
            ->get();
        $irtotalbatal = DB::table('issuereport_tb')
            ->where('issuereport_tb.status', '=', 'Batal')
            ->select('issuereport_tb.*')
            ->get();
        $quote = DB::table('quote')
            ->where('quote.status', '=', 'Selesai')
            ->select('quote.*')
            ->limit(1)
            ->inRandomOrder()
            ->get();
        $quoteds = DB::table('quote')
            ->where('quote.status', '=', 'Selesai')
            ->select('quote.*')
            ->get();
        $quotedash = DB::table('quote')
            ->join('users', 'quote.created_by', '=', 'users.nama_lengkap')
            ->where('quote.status', '=', 'loading')
            ->select('quote.*', 'users.profilephoto')
            ->orderByRaw('quote.updated_at', 'DESC')
            ->get();
        return view('dash.index', ['data_member' => $data_member, 'data_legal' => $data_legal, 'vessel' => $vessel, 'irtotalselesai' => $irtotalselesai, 'irtotal' => $irtotal, 'irtotalbselesai' => $irtotalbselesai, 'irtotalbatal' => $irtotalbatal, 'issueData' => $issueData, 'quote' => $quote, 'quotedash' => $quotedash, 'quoteds' => $quoteds]);
    }
    public function gallery()
    {
        $album = DB::table('albums')
            // ->join('album_photos', 'albums.id','=', 'album_photos.album_id')
            ->orderBy('albums.created_at', 'DESC')
            ->select('albums.*')
            ->get();
        foreach ($album as $item => $list) {
            $album[$item]->photo = DB::table('album_photos')
                ->where('album_photos.album_id', $list->id)
                ->get();
        }
        return view('dash.gallery.index', ['album' => $album]);
    }
    public function deliver()
    {
        return view('dash.deliver.index');
    }
    public function blog()
    {
        return view('dash.blog.index');
    }
    public function addalbum()
    {
        return view('dash.gallery.addalbum');
    }
    public function prosesalbum(Request $request)
    {
        $album = new Album();
        $album->nama_album = $request->nama_album;
        $album->save();
        $albumId = $album->id;

        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move('media/album/', $name);

                $albumphoto = new AlbumPhoto();
                $albumphoto->album_id = $albumId;
                $albumphoto->filename = $name;
                $albumphoto->save();
            }
        }
        return redirect('/dashboard/gallery')->with('selamat', 'Album berhasil dibuat!');
    }
}
