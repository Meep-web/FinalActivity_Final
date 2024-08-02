<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $user = auth()->user(); // Get the currently authenticated user
        return view('dashboard', compact('users', 'user'));
    }
}
