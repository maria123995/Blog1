<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Admin\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request , User $user )
    {
        //    return $request;
        // dd($request->validated());
        // try {
            // $user->Auth::guard('admin')->user()->id;
            // 'user_id' => auth()->user()->id,

          User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect()->route('dashboard.user')->with(['success' =>  'تمت الاضافة بنجاح']);

        // } catch (\Exception $ex) {

        //     return redirect()->route('dashboard.user')->with(['error' => 'حدث خطأ ما']);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.show-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $save = $user->save();
            if ($save) {
                return redirect()->route('dashboard.user')->with(['success' =>  'تمت التعديل بنجاح']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('dashboard.user')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

          $delete = $user->delete();
          if ($delete) {
            session()->flash('success', 'تم الحذف بنجاح');
        }
        return redirect(route('dashboard.user'));

        }
    }

