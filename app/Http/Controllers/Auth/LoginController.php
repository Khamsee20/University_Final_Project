<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->roles == 'Admin') {
                return redirect()->route('admin.index');
            }

            if (auth()->user()->roles == 'Member') {
                return redirect()->route('members.index');
            }
            if (auth()->user()->roles == 'User') {
                return redirect()->route('users.index');
            }
            if (auth()->user()->roles == 'Employee') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('login')->with('error', 'ອີເມວ ຫຼື ລະຫັດຜ່ານ ບໍ່ຖືກຕ້ອງ.');
            }
        }
    }


    // public function redirctTo(){
    //     if(Auth::user()->hasPosition('admin')){
    //         return redirect()->route('admin.index');
    //     }
    //     if(Auth::user()->hasPosition('member')){
    //         return redirect()->route('members.index');
    //     }
    //     if(Auth::user()->hasPosition('users')){
    //         return redirect()->route('users.index');
    //     }
    // }
}
