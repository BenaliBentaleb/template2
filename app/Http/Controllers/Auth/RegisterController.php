<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;

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
        return Validator::make($data, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $user =  User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
           
             
        ]);
<<<<<<< HEAD
        
        Profile::create([
=======
           //     dd($user);
       Profile::create([
>>>>>>> 9a6ff1e456b9b54e6915787ce4ba13cfe8a87724
            'user_id' =>  $user->id,
            'photo_profile'=> '/uploads/avatars/1526153957mal.png',
            'coverture' => null,
            'information' => null,
            'formation_id'=>null,
            'email' =>$user->email,
            'telephone'=>null,
            'date_naissance'=>null,
            'addresse' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'youtube' => null,
            
       ]);
       return $user;
    }
}
