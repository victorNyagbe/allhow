<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.superAdmin');
    }

    public function registrationForm() {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function registration(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'exists:roles,id'],
        ],
        [
            'name.required' => 'Veuillez renseigner le nom de l\'administrateur',
            'name.string' => 'Le nom doit être une chaine de caractères',
            'name.max' => 'Le nom a dépassé le nombre de caractères autorisé',
            'email.required' => 'Veuillez renseigner l\'email de l\'administrateur',
            'email.string' => 'L\'email doit être une chaine de caractères',
            'email.email' => 'Email invalide',
            'email.max' => 'L\'email a dépassé le nombre de caractères autorisé',
            'email.unique' => 'Cet email existe déjà',
            'password.required' => 'Veuillez définir le mot de passe de l\'administrateur',
            'password.string' => 'Le mot de passe doit être une chaine de caractères',
            'password.min' => 'Le mot de passe doit avoir au moins huit (8) caractères',
            'password.confirmed' => 'Confirmation de mot de passe non conforme',
            'role_id.required' => 'Veuillez sélectionner un rôle',
            'role_id.exists' => 'Rôle selectionné invalide'
        ]);

        $new_admin = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role_id'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('administration.dashboard')->with('success', $new_admin->name . ' a été enregistré comme administateur avec succès');
    }
}
