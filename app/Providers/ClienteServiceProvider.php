<?php

namespace App\Providers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class ClienteServiceProvider implements UserProvider
{

    public function __construct(){}

    public function retrieveById($identifier){
        if (empty($credentials)) {
            return;
        }

        $cliente = Cliente::find($identifier);
        return $cliente;
    }

    public function retrieveByToken($identifier, $token){
        return "jdkjfks";
    }
    public function updateRememberToken(Authenticatable $user, $token){
        return "null";
    }

    public function retrieveByCredentials(array $credentials){
        if (empty($credentials)) {
            return;
        }

        $cliente = Cliente::where('email', $credentials['email'])->first();
        var_dump($cliente);
        return $cliente;
    }
    public function validateCredentials(Authenticatable $user, array $credentials){
        var_dump($credentials);
        return ($credentials['email'] == $user->getAuthIdentifier() && Hash::check($credentials['password'], $user->getAuthPassword()));
    }
}