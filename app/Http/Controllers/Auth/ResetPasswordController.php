<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', 'confirmed'],
        ];
    }

    protected function validationErrorMessages(){
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please insert a valid email.',
            'password.required' => 'The email field is required.',
            'password.min' => 'Password must contain minimum eight characters.',
            'password.regex' => 'Password must contain minimum eight characters, at least one uppercase letter, one lowercase letter and one number.'
        ];
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    

    // protected function getResetValidationRules()
    // {
    //     return [
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'password' =>  ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', 'confirmed'],
    //     ];
    // }
    // /**
    //  * Get the password reset validation messages.
    //  *
    //  * @return array
    //  */
    // protected function getResetValidationMessages()
    // {
    //     return [
    //       'password.regex' => 'Password must contain at least 1 lower-case and capital letter, a number and symbol.'
    //     ];
    // }
}
