<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\Authenticatable;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|string|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'pass' => 'required|min:6',
            'country' => 'required',
            'secretQuestion' => 'required',
            'answerSecret' => 'required',
        ],[
            'username.required' => 'El campo es obligatorio',
            'username.max' => 'El nombre de usuario excede el maximo de caracteres permitidos',
            'username.string' => 'El nombre de usuario debe ser una cadena de texto',
            'username.unique' => 'El nombre de usuario ya existe, por favor elije otro!',
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

    protected function redirectTo()
    {
        return '/index';
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(Request $request)
    {
        $user = User::create([
            'memb___id' => $request->username,
            'mail_addr' => $request->email,
            'memb__pwd' => $request->pass,
            'Country' => $request->country,
            'SecretQuestion' => $request->secretQuestion,
            'SecretAnswer' => $request->answerSecret,
            'memb_name' => 'default',
            'sno__numb' => 111111,
            'mail_chek' => 1,
            'bloc_code' => 0,
            'ctl1_code' => 0,
            'confirmed' => 1,
            'Gender' => 1,
            'Vip' => 0,
            'InicioVIP' => 0,
            'FinVIP' => 0,
            'VipDate' => 0,
            'VipINF' => 0,
            'admincp' => 0,
            'credits' => 0,
            'credits2' => 0,
            'm_Grand_Resets' => 0,
            'mvc_vip_date' => 0,
            'msponsor_limit' => 0,
            'smtp_block' => 0,
            'scrable_wrong' => 0,
            'scrable_level' => 0
        ]);
        
        auth()->login($user);
        return redirect('/index');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $pass = $request->password;
        $errors = [];
        $user = User::where('memb___id', $username)
                    ->first();

        if($user['memb___id'] === $username && $user['memb__pwd'] === $pass) {
            auth()->login($user);
            $login = redirect('/index');
        } else if ($username == ''){
            array_push($errors, 'El usuario es obligatorio');
        } else if ($pass == '') {
            array_push($errors, 'La contraseña es obligatoria');
        } else if ($username == '' && $pass == ''){
            array_push($errors, 'El usuario y la contraseña son obligatorias');
        } else {
            array_push($errors, 'Las creedenciales no coinciden');
        }

        if(empty($errors)) {
            return $login;
        } else {
            return view('auth.login', compact('errors'));
        };
    }
}
