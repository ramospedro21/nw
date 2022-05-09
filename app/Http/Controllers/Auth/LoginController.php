<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class LoginController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::query()
            ->firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email.combination' => 'Email or password is invalid'
            ]);
        }

        $token = $user->createToken(request()->userAgent())->plainTextToken;

        return response()->json(compact('token'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
