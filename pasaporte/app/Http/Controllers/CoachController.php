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
        //dump($coaches);
        return view('coaches.index', ["coaches" => $coaches]);
    }

    public function search()
    {
        $value = request('query');
        $coaches = Coach::where('coach_nombre', 'LIKE', '%' . $value . '%')->get();
        dump($coaches);
        return redirect('coaches');
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
        Coach::create($this->validateCoach());
        return view('coaches.success');
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
        return view('coaches.edit', compact('coach'));
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
        $coach->update($this->validateCoach());
        return view('coaches.success');
        //return redirect($coach->path());
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
        Coach::destroy($coach->coach_id);
        return redirect('coaches');
    }

    public function validateCoach()
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
        return request()->validate($rules, $custom_messages);
    }
}
