<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function index() {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès interdit pour les non admins');
        }
        $users = User::where('is_approved', false)->get();
        return view('admin.users', compact('users'));
    }

    public function approve($id) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès interdit pour les non admins');
        }
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur approuvé avec succès.');
    }
}
