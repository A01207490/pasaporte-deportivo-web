<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Carrera;
use \App\Tables\UsersTable;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user_id = auth()->user()->id;
        $table = (new UsersTable($auth_user_id))->setup();
        return view('users.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::orderBy('carrera_nombre', 'asc')->get();
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
        $this->validateUserCreate();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'semestre' => $request->semestre,
            'carrera_id' => $request->carrera_id,
        ]);
        $role = Role::where('name', $request->role)->first();
        $user->roles()->attach($role);
        $index = 'users.index';
        return view('components.success', compact('index'));
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
        $type = $user;
        $index = 'users.index';
        $destroy = 'users.destroy';
        return view('components.confirm', compact('type', 'index', 'destroy'));
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
        $carreras = Carrera::orderBy('carrera_nombre', 'asc')->get();
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
        $role = Role::where('name', $request->role)->first();
        $user->roles()->sync($role);
        $index = 'users.index';
        return view('components.success', compact('index'));
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
        $index = 'users.index';
        return view('components.success', compact('index'));
    }

    public function destroyAll()
    {
        $students = User::where('role_id', 2)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')->delete();
        $index = 'users.index';
        return view('components.success', compact('index'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'alumnos.xlsx');
    }

    public function validateUser()
    {
        $rules = [
            'name' => ['required', 'string', 'regex:/[a-zA-Z]/'],
            'carrera_id' => ['required'],
            'semestre' => ['required'],
            'role' => ['required']
        ];
        return request()->validate($rules);
    }

    public function validateUserCreate()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'carrera_id' => ['required'],
            'semestre' => ['required'],
            'role' => ['required'],
        ];
        return request()->validate($rules);
    }
}
