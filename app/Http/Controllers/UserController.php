<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request): RedirectResponse    
    {
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'password' => 'required|string|max:100',
                'email' => 'required|string|max:100|email'
            ],
            [
                'name.required'=> 'Erro, campo Nome necessário !',
                'name.string'=> 'Erro, campo Nome Invalido !',
                'name.max'=> 'Erro, campo Nome excedeu o máximo de caracteres !',

                'password.required'=> 'Erro, campo senha necessário !',
                'password.string'=> 'Erro, campo Senha Invalido !',
                'password.max'=> 'Erro, campo Senha excedeu o máximo de caracteres !',

                'email.required'=> 'Erro, campo Email necessário !',
                'email.string'=> 'Erro, campo Email Invalido !',
                'email.max'=> 'Erro, campo Email excedeu o máximo de caracteres !',
                'email.email'=> 'Erro, Email Invalido !'
            ]);
        
        $MODEL = new User();
        $MODEL->name = $request->name;
        $MODEL->email = $request->email;
        $user_pass = $request->password;
        $MODEL->password = bcrypt($user_pass);
        $save = $MODEL->save();
        if ($save) 
        {
            return redirect()->back()->with('success','Conta Criada com Sucesso !');
        } else
        {
            return redirect()->back()->with('error','Erro ao Criar Conta');
        }
    }

    public function check(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'password' => 'required|string|max:100',
                'email' => 'required|string|max:100|email'
            ],
            [
                'password.required'=> 'Erro, campo senha necessário !',
                'pw.string'=> 'Erro, campo Senha Invalido !',
                'password.max'=> 'Erro, campo Senha excedeu o máximo de caracteres !',

                'email.required'=> 'Erro, campo Email necessário !',
                'email.string'=> 'Erro, campo Email Invalido !',
                'email.max'=> 'Erro, campo Email excedeu o máximo de caracteres !',
                'email.email'=> 'Erro, Email Invalido !'
           ]);
        
        $user_data = $request->only('email', 'password');
        
       if(Auth::attempt($user_data))
       {
        $user_level = Auth::user()->level;
            if($user_level > 0)
            {
                return redirect()->route('user');
            } else
            {
                return redirect()->route('client');
            }
       } else
       {
            return redirect()->back()->with('error','Usuário não indentificado no sistema');
       }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('home')->with('success','Conta desconectada com sucesso !');
    }
}
