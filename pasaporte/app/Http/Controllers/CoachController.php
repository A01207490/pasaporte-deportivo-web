<?php

namespace App\Http\Controllers;

use App\Coach;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facade;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\ServiceProvider;


class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $coaches = $this->search();
        } else {
            $coaches = Coach::paginate(5);
        }
        return view('coaches.index', compact('coaches'));
    }

    public function search()
    {
        $value = '%' . request('query') . '%';
        $coaches = Coach::where('coach_nombre', 'LIKE', $value)
            ->orWhere('coach_nomina', 'LIKE', $value)
            ->orWhere('coach_correo', 'LIKE', $value)
            ->paginate(10);
        return $coaches;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Coach::create($this->validateCoach());
        $coach_nomina = $request->coach_nomina;
        $qr_code = new Generator;
        $qr_code->generate($coach_nomina,  storage_path('app/public/qr_codes/' . $coach_nomina . '.svg'));
        return view('coaches.success');
    }

    public function download(Coach $coach)
    {
        $coach_nomina = $coach->coach_nomina;
        return response()->download(public_path('storage/qr_codes/' . $coach_nomina . '.svg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        $coach = Coach::find($coach->id);
        return view('coaches.show', compact('coach'));
    }

    public function confirm(Coach $coach)
    {
        return view('coaches.confirm', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
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
        $coach->update($this->validateCoach());
        return view('coaches.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        Coach::destroy($coach->id);
        return view('coaches.success');
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
