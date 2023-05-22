<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.dashboard');
    }
}
