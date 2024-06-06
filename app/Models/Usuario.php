<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = "usuarios";
    protected $fillable = ['email', 'login', 'password', 'nome'];

    public function getAuthIdentifierName()
    {
        return 'login';
    }

    public function getAuthIdentifier()
    {
        return $this->login;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    
    public function setLoginAttribute($login){
        $value = preg_replace("/[^0-9]/", "", $login);
        $this->attributes["login"] = $value;

    }
}
