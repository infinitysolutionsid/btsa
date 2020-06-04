<?php

namespace App\Http\Controllers;

use App\MemberModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
        $users = MemberModel::where('id', '!=', auth::id())->get();
        return view('messages.index', ['users' => $users]);
    }
}
