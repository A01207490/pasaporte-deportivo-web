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
            $users = $this->search()->paginate(5);
        } else {

            $users = User::getAllStudents()->paginate(5);
            //return $users;
        }
        if (\Request::is('api/*')) {

            return response()->json([
                'data' => $users
            ], 200);

            exit();
        } else {
            $carreras = Carrera::all();
            return view('users.index', compact('users', 'carreras'));
        }
    }

    public function search()
    {
        $value = '%' . request('query') . '%';
        $students = User::where('name', 'LIKE', $value)
            ->orWhere('email', 'LIKE', $value)
            ->orWhere('semestre', 'LIKE', $value)
            ->orWhere('carreras.carrera_nombre', 'LIKE', $value)
            ->join('carreras', 'users.carrera_id', '=', 'carreras.id')
            ->select('users.id')
            ->get();
        $query = User::where('role_id', 2)
            ->whereIn('users.id', $students)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('carreras', 'users.carrera_id', '=', 'carreras.id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.id', 'roles.name', 'users.name', 'users.email', 'users.semestre', 'carreras.carrera_nombre');
        return $query;
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

    public function confirmDestroyAll()
    {
        return view('users.confirmDestroyAll');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $carreras = Carrera::all();
        return view('users.edit', compact('user', 'carreras'));
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

    public function destroyAll()
    {
        $students = User::where('role_id', 2)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')->delete();
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
