<?php

namespace App\Http\Controllers;

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

        // test database connection
        try {
            DB::connection()->getPdo();
            echo 'Conexao OK!';
        } catch (\PDOException $e) {
            echo 'Conexao Falhou: ' . $e->getMessage();
        }

        echo '<br>FIM!';
    }

    public function logout() {
        echo 'logout';
    }
    
}
