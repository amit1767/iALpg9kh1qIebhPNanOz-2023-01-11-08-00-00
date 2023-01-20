<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Services\ArabianService;
use App\Arabian\Modules\Users;
use App\Arabian\Modules\Categories;

class UsersController extends Controller
{
    //GET ALL USERS

    protected ArabianService $arabianService;
    public function __construct(ArabianService $arabianService)
    {
        $this->arabianService = $arabianService;
    }

    public function index(Request $request){
        //$data =  $this->arabianService->getUsers($page = 1, $per_page = 10, null);
        return view('admin/users/users');
    }

    public function user(Request $request){
        $userID = $request->id;
        return view('admin/users/edit');
    
    }
}
