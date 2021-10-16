<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Model\admin\admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        // dd(true);
        return view('admin.login');
    }


    public function login(Request $request)
    {
        // dd(true);
        $this->validateLogin($request);

      

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $admin = admin::where('email',$request->email)->first();
        if (empty($admin)) {
            return $request->only($this->username(), 'password');
        }
        else {
            if ($admin->status == 0) {
                return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
            }else {
                return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
            }  
        }
        
        
        
    }


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
