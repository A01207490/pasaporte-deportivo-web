<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Dia;
use App\Coach;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $clases = $this->search();
        } else {
            $clases = Clase::paginate(5);
        }
        return view('clases.index', compact('clases'));
    }

    public function search()
    {
        $value = '%' . request('query') . '%';
        $clases = Clase::where('clase_nombre', 'LIKE', $value)
            ->orWhere('clase_hora_inicio', 'LIKE', $value)
            ->orWhere('clase_hora_fin', 'LIKE', $value)
            ->paginate(10);
        return $clases;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dias = Dia::all();
        $coaches = Coach::all();
        return view('clases.create', compact('dias', 'coaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateClase();
        $clase = Clase::create(([
            'clase_nombre' => $request->clase_nombre,
            'clase_hora_inicio' => $request->clase_hora_inicio,
            'clase_hora_fin' => $request->clase_hora_fin,
            'coach_id' => $request->coach_id,
        ]));
        $clase->dias()->attach(request('dias'));
        return view('clases.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        $clase = Clase::find($clase->id);
        $coach = Coach::find($clase->coach_id);
        return view('clases.show', compact('clase', 'coach'));
    }

    public function confirm(Clase $clase)
    {
        return view('clases.confirm', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        $dias = Dia::all();
        $coaches = Coach::all();
        return view('clases.edit', compact('clase', 'dias', 'coaches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        $this->validateClase();
        $clase->update([
            'clase_nombre' => $request->clase_nombre,
            'clase_hora_inicio' => $request->clase_hora_inicio,
            'clase_hora_fin' => $request->clase_hora_fin,
            'coach_id' => $request->coach_id,
        ]);
        $clase->dias()->sync(request('dias'));
        return view('clases.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        Clase::destroy($clase->id);
        return view('clases.success');
    }
    public function validateClase()
    {
        $rules = [
            'clase_nombre' => ['required', 'string', 'regex:/[a-zA-Z]/'],
            'clase_hora_inicio' => ['required'],
            'clase_hora_inicio' => ['required'],
            'dias' => ['required'],
            'coach_id' => ['required'],
        ];
        $custom_messages = [
            'required' => 'El campo :attribute es requerido.',
            'clase_nombre.regex' => 'El nombre solo puede tener letras'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
