<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Psy\Util\Json;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $this->response("login bo'lidi", ['token'=> $user->createToken($request->email)->plainTextToken]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }


    public function changePassword(Request $request )
    {

        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);

        $auth = Auth::user();
        dd($auth);

	// The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) 
        {
            return $this->error('error', "Current Password is Invalid");
        }

    // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return $this->error("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return $this->response('success', "Password Changed Successfully");
    
    }
}
