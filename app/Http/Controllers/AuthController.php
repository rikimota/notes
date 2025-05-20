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

        // get all the users from database
        
        //as an object instance of the model's classs
        $userModel = new User();
        $users = $userModel->all()->toArray();
        //$users = User::all()->toArray();

        echo '<pre>';
        print_r($users);
    }

    public function logout() {
        echo 'logout';
    }
    
}
