<?php

namespace App\Http\Controllers;

use App\User;
use App\Carrera;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $users = $this->search();
        } else {
            $users = User::paginate(5);
        }
        return view('users.index', compact('users'));
    }

    public function search()
    {
        $value = '%' . request('query') . '%';
        $users = User::where('name', 'LIKE', $value)
            ->orWhere('email', 'LIKE', $value)
            ->paginate(5);
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('users.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request('semestre'));
        User::create($this->validateUser());
        /*
        $user = User::create(([
          
        ]));
        $carrera_user = ([
            'user_id' => $user->id,
            'carrera_id' => $request->carrera_id,
            'user_semestre' => $request->user_semestre,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('carrera_user')->insert($carrera_user);
        */
        return view('users.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function confirm(User $user)
    {
        return view('users.confirm', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($this->validateUser());
        return view('users.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return view('users.success');
    }

    public function validateUser()
    {
        $rules = [
            'name' => ['required', 'string', 'regex:/[a-zA-Z]/'],
            'email' => ['required', 'email', 'regex:/[a-zA-Z0-9._%+-]+@itesm.mx/'],
            'password' => ['required'],
            'carrera_id' => ['required'],
            'semestre' => ['required']
        ];
        $custom_messages = [
            'name.required' => 'El campo nombre es requerido.',
            'email.required' => 'El campo correo es requerido.',
            'password.required' => 'El campo contraseña es requerido.',
            'email.regex' => 'El dominio del correo debe de ser @itesm.mx',
            'name.regex' => 'El nombre solo puede tener letras'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
