<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;


class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('admin', User::class);

        $users = User::paginate();

        return view('roles.index', compact('users'));
    }

    public function edit(User $user)
    {
        Gate::authorize('admin', User::class);
        return view('roles.edit', compact('user'));
    }

    public function update(User $user)
    {
        Gate::authorize('admin', User::class);

        $validatedData = request()->validate([
            'role' => 'required|string|in:admin,librarian,cliente',
        ]);

        // dd($validatedData);

        $user->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Função atualizada com sucesso!');
    }

    public function destroy(User $user)
    {
        Gate::authorize('admin', User::class);

        $user->delete();

        return redirect()->route('roles.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
