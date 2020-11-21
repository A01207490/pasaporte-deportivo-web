<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Carrera;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $carreras = Carrera::orderBy('carrera_nombre', 'asc')->get();
        return view('auth.register', compact('carreras'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'regex:/^A{1}[0-9]{8}@itesm.mx$/', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'carrera_id' => ['required'],
                'semestre' => ['required'],
            ],
            [
                'email.regex' => 'El correo institucional debe tener el siguiente formato: Axxxxxxxx@itesm.mx, donde x es un dígito.',
                //'email.unique' => 'Ya existe una cuenta asignada a este correo.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'semestre' => $data['semestre'],
            'carrera_id' => $data['carrera_id'],
        ]);
        $studentRole = Role::where('name', 'student')->first();
        $user->roles()->attach($studentRole);
        return $user;
    }
}
