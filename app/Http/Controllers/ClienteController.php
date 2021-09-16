<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    public function login(Request $request){
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    
        extract($credentials);

        $cliente = Cliente::where(['email'=> $email])->first();

        if($cliente == null){
            return response()->json(['Erro' => 'credenciais incorretas'], 403);
        }

        $cliente->atualizaComDadosDB();

        if(Auth::guard('cliente')->attempt(['email'=>$email, 'password'=>$password])) {
            $request->session()->regenerate();
            $request->session()->put('email', $email);
            $request->session()->put('id', $cliente->getId());
            return response()->json(['resposta' => 'cliente autenticado'], 200);
        }

        return response()->json(['Erro' => 'credenciais incorretas'], 403);
    }

    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['resposta' => 'cliente deslogado com sucesso'], 200);
    }

    public function cadastrar(Request $request){
        $dadosCliente = $request->input();
        $dadosCliente['password'] = Hash::make($dadosCliente['password']);
        $cliente = new Cliente();
        $cliente->setFromArray($dadosCliente);
        $cliente->save();
        return response()->json($cliente, 200);
    }

    public function alterar(Request $request){
        $dadosCliente = $request->input();
        $cliente = Cliente::find($dadosCliente['id']);

        if($cliente == null){
            return response()->json(['erro' => 'Cliente não encontrado'], 404);
        }

        $cliente->setFromArray($dadosCliente);
        $cliente->save();

        return response()->json($cliente, 200);
    }

    public function deletar($id){
        $cliente = Cliente::find($id);

        if($cliente == null){
            return response()->json(['erro' => 'Cliente não encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['resposta' => 'Cliente deletado com sucesso'], 200);
    }

    public function buscarTodos(Request $request){
        $clientes = Cliente::All();

        return response()->json($clientes, 200);
    }

    public function buscarUm($id){
        $cliente = Cliente::find($id);

        if($cliente == null){
            return response()->json(['erro' => 'Cliente não encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }
}
