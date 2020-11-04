<?php

namespace App\Http\Controllers;

use App\User;
use App\Clase;
use App\Sesion;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\SesionsExport;
use Illuminate\Pagination\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;
use \App\Tables\PasaporteTable;
use \App\Tables\SesionTable;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = (new PasaporteTable)->setup();
        return view('sesions.index', compact('table'));
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
    public function create(User $user)
    {
        $clases = Clase::orderBy('clase_nombre')->get();
        return view('sesions.create', compact('clases', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        Sesion::create([
            'user_id' => $user->id,
            'clase_id' => $request->clase_id,
        ]);
        return view('sesions.success', compact('user'));
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
        $table = (new SesionTable($user->id))->setup();
        $sesions = Sesion::getSesions($user)->paginate(5);
        return view('sesions.show', compact('user', 'sesions', 'table'));
    }

    public function confirm(Sesion $sesion, User $user)
    {
        return view('sesions.confirm', compact('sesion', 'user'));
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
        $user = $sesion->user_id;
        Sesion::destroy($sesion->id);
        return view('sesions.success', compact('user'));
    }
}
