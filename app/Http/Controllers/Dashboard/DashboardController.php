<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        return view('admin.dashboard.index', [
            'users' => $usersCount,
        ]);
    }
}
