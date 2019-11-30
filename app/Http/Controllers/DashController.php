<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function index()
    {
        $data_member = DB::table('users')
            ->select('users.*')
            ->get();
        $data_legal = DB::table('legality')
            ->select('legality.*')
            ->get();
        $vessel = DB::table('vessel')
            ->select('vessel.*')
            ->get();
        return view('dash.index', ['data_member' => $data_member, 'data_legal' => $data_legal, 'vessel' => $vessel]);
    }
}
