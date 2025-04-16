<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class MemberAdminController extends Controller
{
    public function index()
    {
        Log::info('Fetching members list');
        try {
            $members = User::with('transaksis')->orderBy('role', 'asc')->paginate(10);
                
            return view('admin.members', compact('members'));
        } catch (\Exception $e) {
            Log::error('Error fetching members: ' . $e->getMessage());
            return redirect()->route('admin.member')->with('error', 'Failed to fetch members.');
        }
    }

    public function store(Request $request)
    {
        Log::info('Storing new member', ['request' => $request->all()]);
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'no_hp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'role' => 'required|string|in:admin,user',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'role' => $request->role,
            ]);

            Log::info('Member added successfully', ['email' => $request->email]);
            return redirect()->route('admin.member')->with('success', 'Member added successfully!');
        } catch (\Exception $e) {
            Log::error('Error adding member: ' . $e->getMessage());
            return redirect()->route('admin.member')->with('error', 'Failed to add member.');
        }
    }

    public function update(Request $request, $id)
    {
        Log::info('Updating member', ['id' => $id, 'request' => $request->all()]);
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'no_hp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'role' => 'required|string|in:admin,user',
            ]);

            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'role' => $request->role,
            ];

            // Only update password if it's provided
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'string|min:6',
                ]);
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);
            Log::info($userData);
            return redirect()->route('admin.member')->with('success', 'Member updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating member: ' . $e->getMessage());
            return redirect()->route('admin.member')->with('error', 'Failed to update member.');
        }
    }

    public function destroy($id)
    {
        Log::info('Deleting member', ['id' => $id]);
        try {
            $user = User::findOrFail($id);
            $user->delete();

            Log::info('Member deleted successfully', ['id' => $id]);
            return redirect()->route('admin.member')->with('success', 'Member deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting member: ' . $e->getMessage());
            return redirect()->route('admin.member')->with('error', 'Failed to delete member.');
        }
    }
}