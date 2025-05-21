<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller {

    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {
        // form validation
        $request->validate(
            // rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            // error messages
            [
                'text_username.required' => 'O username e obrigatorio',
                'text_username.email' => 'Username deve ser um email valido',
                'text_password.required' => 'A senha e obrigatoria',
                'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
                'text_password.max' => 'A senha deve ter no maximo :max caracteres'
            ]
        );

        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // check if user exist
        $user = User::where('username', $username)
                    ->where('deleted_at', NULL)
                    ->first();

        if(!$user) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou Password incorreto');
        }

        // check if password is correct
        if(!password_verify($password, $user->password)) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou Password incorreto');

        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user section
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        // REDIRECT TO HOME
        return redirect('/');
    }

    public function logout() {
        // logout from app
        session()->forget('user');
        return redirect()->to('/login');
    }
    
}
