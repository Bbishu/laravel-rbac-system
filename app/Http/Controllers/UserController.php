<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function editRole($id)
{
    $user = User::findOrFail($id);

    $roles = Role::all();

    return view('users.roles', compact('user', 'roles'));
}


public function updateRole(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Remove old role and assign new role
    $user->syncRoles([$request->role]);

    return redirect()->route('users.index')
        ->with('success', 'Role Updated Successfully');
}

public function edit($id)
{
    $user = User::findOrFail($id);

    return view('users.edit', compact('user'));
}


public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name'  => 'required',
        'email' => 'required|email',
    ]);

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('users.index')
        ->with('success', 'User Updated Successfully');
}

public function destroy($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('users.index')
        ->with('success', 'User deleted successfully');
}
}