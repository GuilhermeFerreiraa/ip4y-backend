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
        $existingUser = User::where('document', $request->input('document'))->first();

        if ($existingUser) {
            return response()->json(['message' => 'Já existe um usuário cadastrado com esse CPF.'], 400);
        }

        $User = new User();
        $User->document = $request->document;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $birthdate = date('Y-m-d', strtotime($request->birthdate));
        $User->birthdate = $birthdate;
        $User->email = $request->email;
        $User->gender = $request->gender;
        $User->save();

        return response()->json(['message' => 'Usuário criado com sucesso.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'required|in:Masculino,Feminino,Outros'
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $user->update([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender')
        ]);

        return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário excluído com sucesso.']);
    }
}
