<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;
use \App\Tables\AnuncioTable;
use Illuminate\Support\Facades\Storage;


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
        $this->validateAnuncio();
        $anuncio = Anuncio::create((['anuncio_titulo' => $request->anuncio_titulo, 'anuncio_cuerpo' => $request->anuncio_cuerpo,]));
        ($request->file('anuncio_imagen') == null) ?: $request->file('anuncio_imagen')->storeAs('anuncios', $anuncio->id . '.png', 'public');
        $index = 'anuncios.index';
        return view('components.success', compact('index'));
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
        $type = $anuncio;
        $index = 'anuncios.index';
        $destroy = 'anuncios.destroy';
        return view('components.confirm', compact('type', 'index', 'destroy'));
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
        $this->validateAnuncio();
        $anuncio->update((['anuncio_titulo' => $request->anuncio_titulo, 'anuncio_cuerpo' => $request->anuncio_cuerpo,]));
        ($request->file('anuncio_imagen') == null) ?: $request->file('anuncio_imagen')->storeAs('anuncios', $anuncio->id . '.png', 'public');
        $index = 'anuncios.index';
        return view('components.success', compact('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        $this->destroy_image($anuncio->id);
        Anuncio::destroy($anuncio->id);
        $index = 'anuncios.index';
        return view('components.success', compact('index'));
    }

    public function destroyAll()
    {
        $anuncios = Anuncio::all();
        //Se obtienen todos los archivos de qr_codes y se proceden a eliminarse
        $files = Storage::allFiles('public/anuncios');
        Storage::delete($files);
        //Se obtienen todos los id de anuncios para posteriormente eliminar todo el modelo.
        $anuncios_keys = $anuncios->modelKeys();
        Anuncio::destroy($anuncios_keys);
        $index = 'anuncios.index';
        return view('components.success', compact('index'));
    }

    public function confirmDestroyAll()
    {
        return view('anuncios.confirmDestroyAll');
    }

    public function destroy_image(String $anuncio_id)
    {
        $anuncio_imagen = storage_path('app/public/anuncios/' . $anuncio_id . '.png');
        if (file_exists($anuncio_imagen)) {
            unlink($anuncio_imagen);
        }
    }

    public function validateAnuncio()
    {
        $rules = [
            'anuncio_titulo' => ['required'],
            'anuncio_cuerpo' => ['required'],
            'anuncio_imagen' => ['mimes:png,jpg,jpeg'],

        ];
        $custom_messages = [
            'anuncio_titulo.required' => 'El título es requerido.',
            'anuncio_anuncio.required' => 'El cuerpo del anuncio es requerido.'
        ];
        return request()->validate($rules, $custom_messages);
    }
}
