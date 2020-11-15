<?php

namespace App\Http\Controllers;

use App\Coach;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SimpleSoftwareIO\QrCode\Facade;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\ServiceProvider;
use \App\Tables\CoachTable;


class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $table = (new CoachTable)->setup();
        return view('coaches.index', compact('table'));
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
        Coach::create($this->validateCoach(new Coach()));
        $coach_nomina = $request->coach_nomina;
        $qr_code = new Generator;
        $encrypted_coach_nomina = Crypt::encryptString($coach_nomina);
        $qr_code->generate($encrypted_coach_nomina,  storage_path('app/public/qr_codes/' . $coach_nomina . '.svg'));
        $index = 'coaches.index';
        return view('components.success', compact('index'));
    }

    public function download(Coach $coach)
    {
        $coach_nomina = $coach->coach_nomina;
        return response()->download(storage_path('app/public/qr_codes/' . $coach_nomina . '.svg'));
        //return response()->download(public_path('storage/qr_codes/' . $coach_nomina . '.svg'));
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
        $encrypted_coach_nomina = Crypt::encryptString($coach->coach_nomina);
        return view('coaches.show', compact('coach', 'encrypted_coach_nomina'));
    }

    public function confirm(Coach $coach)
    {
        $type = $coach;
        $index = 'coaches.index';
        $destroy = 'coaches.destroy';
        return view('components.confirm', compact('type', 'index', 'destroy'));
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

        $coach_nomina = Coach::find($coach->id)->coach_nomina;
        $coach->update($this->validateCoach($coach));
        $this->destroy_qr_code($coach_nomina);
        $coach_nomina = $coach->coach_nomina;
        $qr_code = new Generator;
        $encrypted_coach_nomina = Crypt::encryptString($coach_nomina);
        $qr_code->generate($encrypted_coach_nomina,  storage_path('app/public/qr_codes/' . $coach_nomina . '.svg'));
        $index = 'coaches.index';
        return view('components.success', compact('index'));
    }

    public function destroyAll()
    {
        $coaches = Coach::all();
        //Se obtienen todos los archivos de qr_codes y se proceden a eliminarse
        $files = Storage::allFiles('public/qr_codes');
        Storage::delete($files);
        //Se obtienen todos los id de coaches para posteriormente eliminar todo el modelo
        $coaches_keys = $coaches->modelKeys();
        Coach::destroy($coaches_keys);
        $index = 'coaches.index';
        return view('components.success', compact('index'));
    }

    public function confirmDestroyAll()
    {

        return view('coaches.confirmDestroyAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        $coach_nomina = $coach->coach_nomina;
        $this->destroy_qr_code($coach_nomina);
        Coach::destroy($coach->id);
        $index = 'coaches.index';
        return view('components.success', compact('index'));
    }

    public function destroy_qr_code(String $coach_nomina)
    {
        $qr_code_file = storage_path('app/public/qr_codes/' . $coach_nomina . '.svg');
        if (file_exists($qr_code_file)) {
            unlink($qr_code_file);
        }
    }

    public function validateCoach(Coach $coach)
    {
        $rules = [
            'coach_nombre' => ['required', 'string'],
            'coach_nomina' => ['required', 'string', 'min:9', 'max:9', 'regex:/^L{1}[0-9]{8}$/', Rule::unique('coaches')->ignore($coach->id)],
            'coach_correo' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@tec.mx$/'],
        ];
        $custom_messages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'El campo debe de ser un correo electrónico.',
            'coach_nomina.min' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.max' => 'La nómina debe de ser de exactamente 9 caracteres.',
            'coach_nomina.regex' => 'La nómina debe de tener el siguiente formato: LXXXXXXXX, donde X es un dígito.',
            'coach_correo.regex' => 'El dominio del correo debe de ser @tec.mx',
            'coach_nomina.unique' => 'Esta nomina ya se encuentra registrada',
            'coach_correo.unique' => 'Este correo ya se encuentra registrado'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
