<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data =[];

        return view("cadastrar",$data);
    }

    public function cadastrarCliente(Request $request){

        $values = $request->all();
        $usuario = new Usuario();
        $usuario->fill($values);
        $usuario->login =$request -> input("login", "");


        $usuario->password = bcrypt($request->input("password")); // Hash da senha

        $endereco = new Endereco($values);
        $endereco->logradouro =$request->input("endereco", "");

        $clienteService = new ClienteService();
        $result = $clienteService->salvarUsuario($usuario, $endereco);

        $message = $result["message"];
        $status =  $result["status"];


        
        $request->session()->flash($status, $message);



        return redirect() -> route("cadastrar");

    }
}
