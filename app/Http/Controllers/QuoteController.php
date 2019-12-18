<?php

namespace App\Http\Controllers;

use App\QuoteDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuoteController extends Controller
{
    public function index()
    {
        $quote = DB::table('quote')
            ->select('quote.*')
            ->orderBy('quote.updated_at', 'DESC')
            ->get();
        return view('quote.index', ['quote' => $quote]);
    }
    public function published()
    {
        $data_quote = DB::table('quote')
            ->select('quote.*')
            ->orderBy('quote.updated_at', 'DESC')
            ->where('quote.status', '=', 'loading')
            ->get();
        return view('quote.published', ['data_quote' => $data_quote]);
    }
    public function addnew(Request $request)
    {
        $quote = new \App\QuoteDB();
        $quote->quotes_name = $request->quotes_name;
        $quote->created_by = auth()->user()->nama_lengkap;
        $quote->status = 'loading';
        $quote->quotes_id  = $request->quotes_id;
        $quote->link_preview = 'not available';
        $quote->updated_by = 'Belum dicek';
        $quote->logIP = $request->getClientIp();
        $quote->save();

        return back()->with('sukses', 'good');
    }
    public function deletequote($quote_id)
    {
        $data_quote = QuoteDB::find($quote_id);

        if ($data_quote) {
            if ($data_quote->delete()) {

                DB::statement('ALTER TABLE quote AUTO_INCREMENT = ' . (count(QuoteDB::all()) + 1) . ';');

                return back()->with('delete', 'Quote berhasil dihapus!');
            }
        }
    }
    public function formselesai($quote_id)
    {
        $data_quote = \App\QuoteDB::find($quote_id);
        return view('quote.formselesai', ['data_quote' => $data_quote]);
    }
    public function formupdate(Request $request, $quote_id)
    {
        $data_quote = \App\QuoteDB::find($quote_id);
        $data_quote->update($request->all());
        $data_quote->link_preview = $request->link_preview;
        $data_quote->updated_by = auth()->user()->nama_lengkap;
        $data_quote->status = 'Selesai';
        $data_quote->save();

        return view('quote.published', ['data_quote' => $data_quote])->with('selesai', 'good');
    }
}
