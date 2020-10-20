<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use Illuminate\Support\Facades\DB;

use App\Album;
use App\AlbumPhoto;
use App\Blog;
use App\track_order;
use App\track_report;

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

    public function blog()
    {
        $blog = DB::table('blogs')
            ->orderBy('blogs.created_at', 'DESC')
            ->get();
        return view('dash.blog.index', ['blog' => $blog]);
    }

    // // // // //
    // ALBUM SYSTEM //
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
    // END ALBUM SYSTEM //
    // // // // //

    // // // // //
    // BLOG SYSTEM //
    public function addblog()
    {
        return view('dash.blog.addblog');
    }
    public function prosesblog(Request $request)
    {
        $blog = new Blog();
        if ($request->hasFile('thumbnail')) {
            $lampiran = $request->file('thumbnail');
            // dd($lampiran);
            $filename = time() . '.' . $lampiran->getClientOriginalExtension();
            $request->file('thumbnail')->move('media/blog/', $filename);
            $blog->thumbnail = $filename;
            $blog->blog_title = $request->blog_title;
            $blog->blog_desc = $request->blog_desc;
            $blog->save();
            return redirect('/dashboard/blog')->with('selamat', 'Blog baru berhasil dipublikasikan.');
        }
    }
    public function trashblog($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            if ($blog->delete()) {
                DB::statement('ALTER TABLE blogs AUTO_INCREMENT = ' . (count(Blog::all()) + 1) . ';');

                return back()->with('selamat', 'Data blog berhasil dihapus.');
            }
        }
    }
    // END BLOG
    // // // // //

    // TRACK SYS //
    // // // // //
    public function deliver()
    {
        $trackorder = DB::table('track_orders')
            ->crossJoin('track_reports')
            ->orderBy('track_orders.order_id', 'ASC')
            ->select('track_orders.*', 'track_orders.order_id as order_ido', 'track_reports.*')
            ->get();
        foreach ($trackorder as $key => $report) {
            $trackorder[$key]->reports = DB::table('track_reports')
                ->where('order_id', $report->order_id)
                ->select('track_reports.*', 'track_reports.order_id as order_idrep')
                ->first();
        }
        // dd($trackorder);
        return view('dash.deliver.index', ['trackorder' => $trackorder]);
    }
    public function addorder(Request $request)
    {
        // Information Hash
        $btsa = 'BTSA';
        $year = Date('Y');
        $randomid = mt_rand(1000, 9999);
        $randomidreport = mt_rand(100, 999);
        $month = Date('md');
        $compact = $btsa . $year . $randomid . $month;
        $justNumber = $year . $randomid . $month;

        $track = new track_order();
        $track->id = $request->id;
        $track->created_by = auth()->user()->nama_lengkap;
        $track->updated_by = auth()->user()->nama_lengkap;

        $track->order_id = $request->order_id;
        $track->sender = $request->sender;
        $track->sender_city = $request->sender_city;
        $track->receiver = $request->receiver;
        $track->receiver_city = $request->receiver_city;
        $track->save();
        $trackId = $track->order_id;

        // TRACK REPORT
        $report = new track_report();
        $report->order_id = $trackId;
        $report->track_id = $btsa . $month . $randomidreport;
        $report->current_location = '-';
        $report->last_location = '-';
        $report->status = 'Order Created';
        $report->container_type_system = '-';
        $report->estimated_arrival_date = '-';
        $report->save();
        return redirect()->back()->with('selamat', 'Data order track baru anda berhasil disimpan!');
        // dd($request->all());
    }
}
