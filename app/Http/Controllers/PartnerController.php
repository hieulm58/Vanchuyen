<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Order;
use App\Http\Requests;

class PartnerController extends Controller
{
    //
    public function partner() {
        if (!Auth::user())
        return Redirect('login');
        if (Auth::user()->role != '1')
            return view('restricted');
        else return view('partner');
    }

}
