<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        return view('roles.index', compact('roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignRole(Request $request, $userId)
    {
        dd($request->all()) ;
        $user = User::findOrFail($userId);

        if ($user->roles->isEmpty()) {
            $user->assignRole($request->input('role'));
        }

        return redirect()->route('roles.index')->with('success', 'Rol asignado correctamente.');
    }
}
