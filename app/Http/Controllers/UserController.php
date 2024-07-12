<?php

namespace App\Http\Controllers;

use App\Enums\JabatanEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required|max:20',
            'jabatan' => ['required', Rule::enum(JabatanEnum::class)],
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'no_hp' => $request->get('no_hp'),
            'jabatan' => $request->get('jabatan'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required|max:20',
            'jabatan' => ['required', Rule::enum(JabatanEnum::class)],
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',
        ]);

        $user->fill($request->except(['password']));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
