<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notification;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

// use App\Http\Controllers\Auth\notify;
class CustomAuthController extends Controller
{
    // public function index()
    // {
    //     return view('customAuth.index');
    // }


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

        // // return redirect()->intended('dashboard');
        // return redirect()->route('dashboard.dashboard');
        // return "hi";

        // return redirect('dashboard/');

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])); {

            // return redirect()->route('dashboard.dashboard')->with(['success' =>  'success login admin']);

            return "hi";
        }

        // notif()->success('success login admin');

        return redirect()->route('dashboard.dashboard')->with(['error' => 'حدث خطأ ما']);
    }


    // return back()->withInput($request->only('email'));
}
