<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    

    public function index()
    {
        // dd(Auth::user()->role_id);
        if(Auth::user()->role_id == '2')
        {
            return redirect('/admin/dashbord');
        }
    }
}
