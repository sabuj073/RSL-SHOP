<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\HomeModel;
use DB;
use Redirect;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form(){
        Redirect::setIntendedUrl(url()->previous(RouteServiceProvider::HOME));
        $info = HomeModel::getinfo();
        $logo = HomeModel::getlogo();
        $getmeta = HomeModel::getmeta('home');
        $name1 = 'Login';
        $description1 = $getmeta->description;
        $baseurl = HomeModel::imageBase();
        $currency = HomeModel::currency();
        $categories = HomeModel::getcategories();
        $prev_image = $prev_image = HomeModel::set_prev_image(false,$logo,$baseurl);
        return view('auth.login',compact('name1','description1','logo','info','prev_image','baseurl','currency','categories'));
    }
}
