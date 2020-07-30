<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //


    public function dashboard(Request $request) {
        // $request->session_destroy();
        return view('user.main-tiles');
    }
}
