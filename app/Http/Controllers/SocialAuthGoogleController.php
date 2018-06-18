<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Profile;
use App\Role;
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    
    public function callback()
    {
      //  try {
            
        
            $googleUser = Socialite::driver('google')->stateless()->user();
           // dd($googleUser);
           
           $existUser = User::where('email',$googleUser->email)->first();
            
 
            if($existUser) {
           //     dd($existUser);
          // return $existUser->id;
                Auth::loginUsingId($existUser->id);
                return redirect()->to('/home');
             
            } else {
                $user = new User;


                $splitName = explode(' ', $googleUser->name, 2); 

                $user->nom =  $splitName[0];
                $user->prenom = !empty($splitName[1]) ? $splitName[1] : '';
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = bcrypt('123456');
                $user->save();
                $profile  = new Profile;
                $profile->user_id = $user->id;
                $profile->photo_profile =  '/uploads/avatars/1529122477av4.png';
                $profile->coverture = 'uploads/covertures/1529275249slider3.png';
                $profile->email = $user->email;
                $profile->save();


               Role::create([
                'user_id' =>  $user->id,
                'nom'=>'Etudiant'
               ]);
              // Auth::loginUsingId($user->id);
              return view('ModifyPassword')->with('id', $user->id);// ->with('profile',Auth::id());
        
              
            }
            


      
    }
}
