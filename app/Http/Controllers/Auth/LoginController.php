<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;
use Image;
use Storage;
use File;
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
    
    // public function redirectToFacebook($provider)
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    // public function handleFacebookCallback(SocialFacebookAccountService $service)
    // public function handleFacebookCallback($provider)
    // {
    //     $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    //     auth()->login($user);
    //     return redirect()->to('/');
    //     try {
    //         return 2;
    //         $facebookUser = Socialite::driver('facebook')->stateless()->user();
    //         // $finduser = User::where('google_id', $facebookUser->id)->first();
    //         $existUser = User::where('email',$facebookUser->email)->first();
    //         if($existUser){
    //             Auth::loginUsingId($existUser->id);
    //         }
    //         else{
    //             $user = new User;
    //             $user->name = $facebookUser->name;
    //             $user->email = $facebookUser->email;
    //             $user->password = md5(rand(1,10000));
    //             $user->role = "user";
    //             $user->avatar = $facebookUser->avatar;
    //             $user->facebook_id = $facebookUser->id;
    //             dd($user);  
    //             $user->save();
    //             Auth::loginUsingId($user->id);
    //         }
    //         return redirect()->to('/');
    //     } catch (Exception $e) {
    //         // return redirect('auth/facebook');
    //         return 'error';
    //     }
    // }


    public function redirectToProvider($provider)
    {
        // return Socialite::driver('google')->redirect();
        // return 2;
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
    try {
        $user = Socialite::driver($provider)->stateless()->user();
    } catch (Exception $e) {
        return redirect()->route('login');
    }

    $existingUser = User::where('email', $user->getEmail())->first();
    if ($existingUser) {
        auth()->login($existingUser, true);
    } else {
        $newUser                    = new User;
        $newUser->provider          = $provider;
        $newUser->provider_id       = $user->getId();
        $newUser->name              = $user->getName();
        $newUser->email             = $user->getEmail();
        $newUser->password             = md5(rand(1,10000));
        $newUser->email_verified_at = now();
        // Avatar
        $avatar                     = $user->getAvatar();
        if($provider === 'google'){
            $content                    = file_get_contents($avatar);
            // strrpos gets the position of the last occurrence of the slash; substr returns everything after that position.
            $basename                   = basename($avatar);
            // $ext                        = end(explode('.', $basename));
            $tmpext                     = explode('.', $basename);
            $ext                        = end($tmpext);
            // $filename                   = rename($basename,time().'.'.$ext);
            $filename                   = time().'.'.$ext;
            Storage::disk('uploadsAvatar')->put($filename, $content);
        }
        else if($provider === 'facebook'){
            $fileContents = file_get_contents($user->getAvatar());
            $filename = time().'.jpg';
            File::put(public_path() . '/uploads/avatar/' . $filename, $fileContents);
            //To show picture 
            // $picture1 = public_path('uploads/avatar/' . time() . ".jpg");
        }
        $newUser->avatar = $filename;    
        // dd($filename);
        $newUser->save();

        auth()->login($newUser, true);
    }
    return redirect()->to('/');
    // return redirect($this->redirectPath());
}

    // public function handleProviderCallback($provider)
    // {
    //     try {
    //         $User = Socialite::driver($provider)->user();
    //         // $googleUser = Socialite::driver('google')->stateless()->user();
    //         // $finduser = User::where('google_id', $googleUser->id)->first();
    //         $existUser = User::where('email',$User->email)->first();
    //         if($existUser){
    //             Auth::loginUsingId($existUser->id);
    //         }
    //         else{
    //             $user = new User;
    //             $user->name = $User->name;
    //             $user->email = $User->email;
    //             $user->password = md5(rand(1,10000));
    //             $user->role = "user";
    //             $user->avatar = $User->avatar;
    //             $user->provider_id = $User->id;
    //             $user->provider_id = $provider;
    //             dd($user);  
    //             $user->save();
    //             Auth::loginUsingId($user->id);
    //         }
    //         return redirect()->to('/');
    //     } catch (Exception $e) {
    //         // return redirect('auth/{provider}');
    //         return 'error';
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

    // public function handleGoogleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();
    //     } catch (\Exception $e) {
    //         return redirect('/login');
    //     }
    //     // only allow people with @company.com to login
    //     if(explode("@", $user->email)[1] !== 'company.com'){
    //         return redirect()->to('/');
    //     }
    //     // check if they're an existing user
    //     $existingUser = User::where('email', $user->email)->first();
    //     if($existingUser){
    //         // log them in
    //         auth()->login($existingUser, true);
    //     } else {
    //         // create a new user
    //         $newUser                  = new User;
    //         $newUser->name            = $user->name;
    //         $newUser->email           = $user->email;
    //         $newUser->google_id       = $user->id;
    //         $newUser->avatar          = $user->avatar;
    //         // $newUser->avatar_original = $user->avatar_original;
    //         $newUser->save();
    //         auth()->login($newUser, true);
    //     }
    //     return redirect()->to('/home');
    // }
}
