<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;

class DashController extends Controller
{
    public function index()
    {
        $data_item = \App\itemModel::all();
        return view('dash.index', ['data_item' => $data_item]);
    }
}
