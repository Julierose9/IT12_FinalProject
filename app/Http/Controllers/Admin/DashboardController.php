<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Optional: load data dynamically later (e.g. stats, charts)
        return view('admin.dashboard');
    }
}
