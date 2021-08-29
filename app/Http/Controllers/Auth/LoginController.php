<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $data = $request->only([
            'email','password'
        ]);

        $validator = $this->validator($data);
        $remember = $request->input('remember', false);

        if($validator->fails()){
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }

        if(Auth::attempt($data,$remember)){
            return redirect()->route('index');
        }else{
            $validator->errors()->add('password', 'Email e/ou senha errado(s)');

            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    protected function validator($data){
        return Validator::make($data, [
            'email' => ['required','string','email','max:100'],
            'password' => ['required','string','min:4']
        ]);
    }
}
