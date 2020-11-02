<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;
use \App\Tables\AnuncioTable;


class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = (new AnuncioTable)->setup();
        return view('anuncios.index', compact('table'));
    }

    public function search()
    {
        $value = '%' . request('query') . '%';
        $anuncios = Anuncio::where('anuncio_titulo', 'LIKE', $value)
            ->orWhere('anuncio_cuerpo', 'LIKE', $value)
            ->orWhere('created_at', 'LIKE', $value)
            ->orWhere('updated_at', 'LIKE', $value);
        return $anuncios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Anuncio::create($this->validateAnuncio());
        return view('anuncios.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        $anuncio = Anuncio::find($anuncio->id);
        return view('anuncios.show', compact('anuncio'));
    }

    public function confirm(Anuncio $anuncio)
    {
        return view('anuncios.confirm', compact('anuncio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        return view('anuncios.edit', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        $anuncio->update($this->validateAnuncio());
        return view('anuncios.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        Anuncio::destroy($anuncio->id);
        return view('anuncios.success');
    }

    public function validateAnuncio()
    {
        $rules = [
            'anuncio_titulo' => ['required'],
            'anuncio_cuerpo' => ['required']
        ];
        $custom_messages = [
            'anuncio_titulo.required' => 'El título es requerido.',
            'anuncio_anuncio.required' => 'El cuerpo del anuncio es requerido.'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
