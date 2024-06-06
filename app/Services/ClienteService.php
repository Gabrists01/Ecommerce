<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class ClienteService {

    public function salvarUsuario(Usuario $user, Endereco $endereco){
        try {
            $dbUsuario = Usuario::where("login", $user->login)->first();
            if($dbUsuario){
                
            return [ 'status' => 'err', 'message'=>'Login ja Cadastrado no Sistema'];
            }

            \DB::beginTransaction();
            $user->save();
            $endereco->usuario_id = $user->id;
            $endereco->save();
            \DB::commit();

            return [ 'status' => 'ok', 'message'=>'Usuario cadastrado com Sucesso!'];

        } catch (\Exception $e) {
            //Tratar Erro

            \Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario',
                                             'message'=> $e->getmessage()]);
            \DB::rollback();
            return [ 'status' => 'err', 'message'=>'Não foi possivel cadastrar o Usuário'];
        }

    }

}