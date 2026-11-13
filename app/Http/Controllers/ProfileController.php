<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Halaman edit profile
    public function edit()
    {
        return view('profile.editProfile');
    }

    // Update nama dan email
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'namaLengkap' => ['required', 'string', 'max:255'],
        ]);

        $user->namaLengkap = $validated['namaLengkap'];

        $user->save();

        return back()->with(
            'success_profile',
            'Nama pengguna berhasil diperbarui.'
        );
    }

    // Halaman ganti password
    public function editPassword()
    {
        return view('profile.changePassword');
    }

    // Proses update password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with(
            'success_password',
            'Password berhasil diperbarui.'
        );
    }
}
