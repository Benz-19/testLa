<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $userInput = $request->validate([
            'name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'name')],
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => ['required', 'min:2']
        ]);
        $userInput["password"] = bcrypt($userInput["password"]);

        $user = User::create($userInput);
        auth()->login($user);
        return redirect("/");
    }

    public function logout()
    {
        auth()->logout();
        return redirect("/");
    }

    public function login(Request $request)
    {
        $userInput = $request->validate([
            'loginuser' => ['require', 'min:3'],
            'loginpassword' => ['require', 'min:3'],
        ]);

        if (Rule::exists('users', $userInput['loginuser'])) {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
