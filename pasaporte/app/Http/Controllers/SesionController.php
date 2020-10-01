<?php

namespace App\Http\Controllers;

use App\User;
use App\Sesion;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\SesionsExport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Estos son usuarios
        $users = User::whereIn('id', function ($query) {
            $query->select('user_id')->from('clase_user');
        })->paginate(5);
        return view('sesions.index', compact('users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new SesionsExport, 'sesions.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(User $sesion)
    {
        //$sesion: es un usuario
        $user = $sesion;
        //$user = User::find($user->id);
        /*
        $sesions = Sesion::where('user_id', $user->id)
            ->join('clases', 'clase_user.clase_id', '=', 'clases.id')
            ->join('users', 'clase_user.user_id', '=', 'users.id')
            ->join('coaches', 'clases.coach_id', '=', 'coaches.id')
            ->select('clase_user.created_at', 'users.name', 'users.email', 'clases.clase_nombre', 'clases.clase_hora_inicio', 'clases.clase_hora_fin', 'coaches.coach_nombre', 'coaches.coach_nomina', 'coaches.coach_correo')
            ->paginate(5);
        */
        $sesions = Sesion::getSesions($user)->paginate(5);
        //$sesions = $this->paginate($user->clases);
        //return $sesions = $user->clases->paginate(6);
        //return $sesions;
        return view('sesions.show', compact('user', 'sesions'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesion $sesion)
    {
        //
    }
}

/*
  $users = User::select('*')
            ->whereIn('id', function ($query) {
                $query->select('user_id')->from('sesions');
            })
            ->paginate(10);
        return view('sesions.index', compact('users'));
*/