<?php

namespace App\Http\Controllers;

use App\User;
use App\Carrera;
use App\Exports\UsersExport;
use \App\Tables\UsersTable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $table = (new UsersTable)->setup();
        return view('users.index', compact('table'));
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
            'semestre' => ['required']
        ];
        return request()->validate($rules);
    }
}
