<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request){
        $data = [];


        if($request->isMethod("POST")){
            //SE ENTRAR NESSE IF É PQ O USUARIO CLICOU EM LOGAR

            $login = $request->input("login");
            $senha = $request->input("senha");

            $login = preg_replace("/[^0-9]/", "", $login);

            $credential =['login' => $login, 'password' => $senha];
            //logar
            if(Auth::attempt($credential)){
                return redirect()->route("home");
            }else{
                $request->session()->flash("err", "Usuário / senha inválido");
                return redirect()->route("logar");
            }
        }

        return view("logar", $data);

    }

    public function sair(Request $request){
        //deslogar o usuario
        Auth::logout();
        return redirect()->route("home");
    }
}
