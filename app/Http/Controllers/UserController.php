<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('is_admin', 'asc')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users,name|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'is_admin' => 'required|boolean',
        ]);
    
        if ($validatedData['is_admin'] != 1) {
            return redirect()->back()->with('error', 'Anda tidak dapat membuat user dengan role ini');
        }
    
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->is_admin = $validatedData['is_admin'];
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }    

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function profile()
    {
        // Logic to fetch user profile data or perform any other actions
        $user = Auth::user();

        // Assuming you have a `profile.blade.php` view file inside the `views/user` directory
        return view('user.profile.index', compact('user'));
    }

    public function edit(User $user)
    {
        // return view('user.edit', compact('user'));
        return redirect()->route('user.index')->with('info', 'Anda tidak dapat mengedit data pada Daftar User');
    }

    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);

        // if ( $user->is_admin == 0 ) {
        //     return redirect()->route('user.index')->with('error', 'Tidak dapat mengedit Decision Maker!');
        // }
        
        // $request->validate([
        //     'name' => 'required|string|unique:users,name,' . $id,
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'nullable|min:4',
        //     'is_admin' => 'required|boolean' . ($id == Auth::user()->id ? '' : '|unique:users,name,' . $id),
        // ]);

        // $user = User::findOrFail($id);

        // $user->name = $request->name;
        // $user->email = $request->email;
        // if ($request->password) {
        //     $user->password = Hash::make($request->password);
        // }
        // $user->is_admin = $request->is_admin;
        // $user->save();

        // return redirect()->route('user.index')->with('success', 'User berhasil diupdate.');
        return redirect()->route('user.index')->with('info', 'Anda tidak dapat mengedit data pada Daftar User');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.profile.change-profile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'current_password' => 'nullable',
            'new_password' => 'nullable|min:4|confirmed',
            'new_password_confirmation' => 'required_with:new_password',
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai',
        ]);

        // Update name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('new_password')) {
            // Verify current password
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Password sekarang tidak sesuai.');
            }
            // Set new password
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // // Cek apakah pengguna yang sedang login sama dengan pengguna yang ingin dihapus
        if ($user->id === Auth::user()->id) {
            return redirect()->route('user.index')->with('error', 'Anda tidak dapat menghapus data diri sendiri!');
        } else 
        // if ($user->id === 1 || $user->id === 2) {
        //     return redirect()->route('user.index')->with('error', 'Tidak dapat menghapus pengguna dengan id tersebut!');
        // }
        if ($user->is_admin == 0) {
            return redirect()->route('user.index')->with('error', 'Tidak dapat menghapus Decision maker!');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
