<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database excluding the logged in user
        $users = User::latest()->where('id', '!=', auth()->id())->get();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'role' => 'required|string|max:20',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => bcrypt('password'), // Default password
            'role' => $request->role,
        ]);
        return redirect()->route('admin.user.create')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'dob' => 'nullable|date',
            'status' => 'required|in:active,inactive',
            'role' =>"required"
        ]);

        $user->update($validated);

        return redirect()->route('admin.user.show', $user->id)
            ->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function changeStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();
        return redirect()->back()->with('success', 'User status updated successfully.');
    }

    public function transactions()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('admin.transactions', compact('transactions'));
    }



}
