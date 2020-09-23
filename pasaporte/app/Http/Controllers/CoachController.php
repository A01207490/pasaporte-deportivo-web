<?php

namespace App\Http\Controllers;

use App\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coaches = Coach::paginate(10);
        return view('coaches.index', ["coaches" => $coaches]);
    }

    public function search()
    {
        //
        //$coaches;
        /*
        $coaches = collect($coaches);

        $selected_coach = $coaches->filter(function ($value, $key) {
            return data_get($value, 'mark') > 34;
        });

        $selected_coach = $selected_coach->all();

        dd($passedstudents);*/
        //return view('coaches', ["coaches" => $coaches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coaches.create');
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
        $rules = [
            'coach_nombre' => ['required'],
            'coach_nomina' => ['required', 'min:9', 'max:9', 'regex:/L+[0-9]/'],
            'coach_correo' => ['required', 'email', 'regex:/[a-zA-Z0-9._%+-]+@tec.mx/']
        ];

        $custom_messages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'El campo debe de ser un correo electrónico.',
            'coach_nomina.min' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.max' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.regex' => 'La nómina debe de tener el siguiente formato: LXXXXXXXX, donde X es un dígito.',
            'coach_correo.regex' => 'El dominio del correo debe de ser @tec.mx'
        ];
        $this->validate($request, $rules, $custom_messages);
        /*
        request()->validate([
            'coach_nombre' => ['required', 'min:9'],
            'coach_nomina' => ['required', 'max:9'],
            'coach_correo' => ['required', 'email']
        ]);
        */

        return view('coaches.created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        //
    }
}
