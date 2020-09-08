<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check.superAdmin');
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
