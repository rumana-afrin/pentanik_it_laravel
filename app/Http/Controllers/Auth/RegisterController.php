<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\CoreConstant;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
   public function create()
    {
        return view('auth.register');
    }

   public function store(Request $request){
        $request->validate([
         'name' => 'required|string',
         'email' => 'required|email|string|unique:users',
         'password' => ['required', 'confirmed', Password::min(6)],
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
         'designation' => 'nullable',
         'phone' => 'nullable',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->status = 1;

        $user->save();
        return redirect()->route('login')->with('success', CoreConstant::CREATED_SUCCESSFULLY);
   }
}
