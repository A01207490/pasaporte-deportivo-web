<?php

namespace App\Http\Controllers;

use App\Clase;
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
            $clases = Clase::paginate(10);
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
        return view('clases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Clase::create($this->validateClase());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        //
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
        //
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
        return redirect('clases');
    }
    public function validateCoach()
    {
        $rules = [
            'coach_nombre' => ['required', 'string', 'regex:/[a-zA-Z]/'],
            'coach_nomina' => ['required', 'min:9', 'max:9', 'regex:/L+[0-9]/'],
            'coach_correo' => ['required', 'email', 'regex:/[a-zA-Z0-9._%+-]+@tec.mx/']
        ];
        $custom_messages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'El campo debe de ser un correo electrónico.',
            'coach_nomina.min' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.max' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.regex' => 'La nómina debe de tener el siguiente formato: LXXXXXXXX, donde X es un dígito.',
            'coach_correo.regex' => 'El dominio del correo debe de ser @tec.mx',
            'coach_nombre.regex' => 'El nombre solo puede tener letras'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
