<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
{
    $profile = Auth::user()->profile;
    return view('profile.index', compact('profile'))->with('activeMenu', 'profile');
}

public function edit()
{
    $profile = Auth::user()->profile;
    return view('profile.edit', compact('profile'))->with('activeMenu', 'profile');
}

public function update(Request $request)
{
    // validasi & simpan profile
    // ...
    
    return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
}

}