<?php

namespace App\Http\Controllers\ResturantManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('resturant_manager.dashboard', get_defined_vars());
    }
}
