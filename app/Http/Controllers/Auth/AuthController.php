<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firebase\Auth\Token\Exception\InvalidToken;
use App\Services\ArabianService;
use App\Arabian\Modules\ForgotPassword;
use Session;

class AuthController extends Controller
{

    protected ArabianService $arabianService;
    public function __construct(ArabianService $arabianService)
    {
        $this->arabianService = $arabianService;
    }

    // Login Page
    public function index()
    {
        if (Session::get('LoggedInUserId')) {
            return redirect()->route("dashboard");
        }
        return view('login');
    }

    // Login
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => "required",
            'password' => 'required',
        ]);

        $result = $this->arabianService->login($request->username, $request->password);

        if (isset($result->registered) && $result->registered ==  true){
            Session::put('AuthUser', $result);
            Session::put('LoggedInUserId', $result->localId);
            Session::put('LoggedInUserRole', $result->email);
            return redirect()->route("dashboard");
        }else{
            if($result->error->code == 400) {
                if($result->error->message == "INVALID_EMAIL"){
                    return redirect()->back()->withError(array('message' => 'Invalid Email.'));
                }else{
                    return redirect()->back()->withError(array('message' => 'Invalid Password.'));
                }
                return redirect()->back()->withError($result->error->message);
            }
        }
    }

    // Recover Password
    public function forgotPassword(Request $request)
    {
        $this->validate($request, [
            'username' => "required",
        ]);

        $result = $this->arabianService->forgotpassword($request->username);
        if ($result->status == true) {
            // Code for sending email link for reset password
            return redirect()->back()->withSuccess('Please check ,Email send with password reset link');
        } else {
            return redirect()->back()->withError('Something went wrong, please try again');
        }
    }

    public function resetPassword(Request $request){
        $this->validate( $request, [
            'password' => 'required|string|min:6|confirmed',
            'repeat_password' => 'required',
        ]);
    }
}
