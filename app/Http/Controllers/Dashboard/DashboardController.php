<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    // Dashboard
    public function index(){
        $user = Session::get('AuthUser');
        return view('dashboard', compact("user"));
    }

    // Logout
    public function logout() {
        Session::forget('AuthUser');
		Session::forget('LoggedInUserId');
		Session::forget('LoggedInUserRole');
        Session::flush();

        return redirect()->route("login");
    }

    //PROFILE
    public function profile(){
        $user = Auth::user();

        return view('profile', compact("user"));
    }

    //SUPPORT
    public function support(){
        $user = Auth::user();

        return view('support', compact("user"));
    }

}
