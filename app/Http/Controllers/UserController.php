<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $document = $request->input('document');
        $existingUser = User::where('document', $document)->first();

        if ($existingUser) {
            return response()->json(['message' => 'Já existe um usuário cadastrado com esse CPF.'], 400);
        }

        $user = new User();
        $user->fill($request->all());
        $user->birthdate = date('Y-m-d', strtotime($request->birthdate));
        $user->save();

        return response()->json(['message' => 'Usuário criado com sucesso.']);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o usuário'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'Usuário excluído com sucesso.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao excluir o usuário'], 500);
        }
    }
}
