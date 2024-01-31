<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get();

        $countUser = User::count();

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => $users,
            'countUser' => $countUser
        ]);
    }
}
