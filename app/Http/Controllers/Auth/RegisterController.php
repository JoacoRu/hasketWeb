<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'account' => 'required|max:255|string|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'pass' => 'required|min:6',
            'country' => 'required',
            'secretQuestion' => 'required',
            'answerSecret' => 'required',
        ],[
            'account.required' => 'El campo es obligatorio',
            'account.max' => 'El nombre de usuario excede el maximo de caracteres permitidos',
            'account.string' => 'El nombre de usuario debe ser una cadena de texto',
            'account.unique' => 'El nombre de usuario ya existe, por favor elije otro!',
            'email.required' => 'El campo es obligatorio',
            'email.email' => 'Debes ingresar un email con un formato valido',
            'email.max' => 'El email ingresado excede el maximo de caracteres permitidos',
            'email.unique' => 'El email ya existe, porfavor elije otro!',
            'country.required' => 'El campo es obligatorio',
            'country.notIn' => 'Por favor elije un pais',
            'secretQuestion.required' => 'Por favor elije una pregunta secreta',
            'secretQuestion.notIn' => 'Por favor elije una pregunta secreta',
            'answerSecret.required' => 'El campo es obligatorio',
            'answerSecret.notIn' => 'Por favor elije una respuesta secreta'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'account' => $data['account'],
            'email' => $data['email'],
            'pass' => bcrypt($data['pass']),
            'country' => $data['country'],
            'secretQuestion' => $data['secretQuestion'],
            'answerSecret' => $data['answerSecret'],
        ]);
    }
}
