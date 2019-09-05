<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function handleGoogleCallback()
    // {
    //     try {
  
    //         $user = Socialite::driver('google')->user();
   
    //         $finduser = User::where('google_id', $user->id)->first();
   
    //         if($finduser){
   
    //             Auth::login($finduser);
  
    //             return redirect('/home');
   
    //         }else{
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'google_id'=> $user->id
    //             ]);
  
    //             Auth::login($newUser);
   
    //             return redirect()->back();
    //         }
  
    //     } catch (Exception $e) {
    //         return redirect('auth/google');
    //     }
    // }
        
//     public function handleGoogleCallback()
// {
//     try {
//         $user = Socialite::driver('google')->user();
//     } catch (\Exception $e) {
//         return redirect()->route('login');
//     }

//     $existingUser = User::where('email', $user->getEmail())->first();

//     if ($existingUser) {
//         auth()->login($existingUser, true);
//     } else {
//         $newUser                    = new User;
//         // $newUser->provider_name     = $driver;
//         $newUser->provider_id       = $user->getId();
//         $newUser->name              = $user->getName();
//         $newUser->email             = $user->getEmail();
//         $newUser->email_verified_at = now();
//         $newUser->avatar            = $user->getAvatar();
//         $newUser->save();

//         auth()->login($newUser, true);
//     }

//     return redirect($this->redirectPath());
// }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            // $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
