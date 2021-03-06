<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;
use App\Departement;
use App\Role;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $messages = [
            'nom.required' => 'Svp rempli le champ nom !',
            'nom.regex' => 'Le champ nom doit etre une chaine de caractères !',
            'prenom.required' => 'Svp rempli le champ prenom !',
            'prenom.regex' => 'Le champ prenom doit etre une chaine de caractères !',

            'email.required' => 'Svp rempli le champ email !',
            'email.unique' => 'le champ email doit etre unique !',
            'email.email' => 'Le format d\'email est invalide',
            'password.required' => 'Svp rempli le champ mot de pass !',
            'password.min' => 'Le mot de pass doit etre composé au moins de 6 caractères !',
            'password.confirmed' => 'Le mot de pass doit etre identique !',
        ];
        return Validator::make($data, [
            'nom' => 'required|regex:/^[A-z]+$/|string|max:255',
            'prenom' => 'required|regex:/^[A-z]+$/|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
            
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $user =  User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
            /* 'formation_id' => $data['formation_id'] */
             
        ]);
        
        Profile::create([
            'user_id' =>  $user->id,
            'photo_profile'=> '/uploads/avatars/1529122477av4.png',
            'coverture' => 'uploads/covertures/1529275249slider3.png',
            'information' => null,
            'formation_id'=> $data['formation_id'],
            'email' =>$user->email,
            'telephone'=>null,
            'date_naissance'=>null,
            'addresse' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'youtube' => null,
            
       ]);
       Role::create([
        'user_id' =>  $user->id,
        'nom'=>'Etudiant'
       ]);
       return $user;
    }
    protected function showRegistrationForm() {
        
        return view('auth.register')->with('departements',Departement::all());
     }
}
