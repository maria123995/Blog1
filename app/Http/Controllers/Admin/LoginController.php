<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{


    // use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN;


    public function adminlogin()
    {
        return view('dashboard.auth.login');
    }

    public function checkAdminlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        $remember_me = $request->has('remember_me') ? true : false;

        // if(Auth::guard('admin')->attempt(['email' => $request -> email, 'password' => $request ->password]));


        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])); {

            return redirect()->route('dashboard.dashboard')->with(['success' =>  'success login admin']);

            // return "hi";
        }

        return redirect()->route('login')->with(['error' => 'حدث خطأ ما']);
    }


    // return back()->withInput($request->only('email'));

}
