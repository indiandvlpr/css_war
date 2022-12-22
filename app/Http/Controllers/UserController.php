<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'email|unique:users',
            'phone' => 'string|required',
            'course' => 'string|required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->course = $request->course;
        $user->phone = $request->phone;
        $user->username = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        \Auth::attempt([
            'username' => $request->email,
            'password' => $request->password,
        ], true);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => "string|required",
            'password' => 'string|required',
        ]);

        \Auth::attempt([
            'username' => $request->email,
            'password' => $request->password,
        ], true);

        if (!\Auth::check()) {
            return redirect()->back()->withErrors(['username' => 'Invalid username or password']);
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }

    public function submitCode(Request $request)
    {
        // $request->validate([
        //     'cssCode' => 'required',
        //     'htmlCode' => 'required',
        // ]);

        $user = \Auth::user();

        $user->cssCode = $request->cssCode ;
        $user->htmlCode = $request->htmlCode ;

        $user->lastUpdate = Carbon::now();

        $user->save();

        return response()->json([
            'success' => true,
        ]);

    }
}
