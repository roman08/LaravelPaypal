<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Request;
use URL;

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
    protected $redirectTo = '/web/home/chocomercios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Session::put('url',URL::previous());
        $previo= Session::get('url');
        //dd($previo);
        //borramos las sessiones
        session()->forget('url');
        session()->forget('local');

        //creamos unas nuevas
        Session::put('local',Request::url());
        Session::put('url',URL::previous());
        $previo= Session::get('url');

        $local= Session::get('local');
        //dd('previo:'.$previo.'local: '.$local);
       // dd(Session::get('local'));
        $this->middleware('guest')->except('logout');
        $this->redirectTo = URL::previous();
       
    }

     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginFormUnico()
    {
        return view('auth.loginUnico');
    }

}
