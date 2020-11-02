<?php

namespace App\Tables;

use App\Anuncio;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class AnuncioTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(Anuncio::class)
        ->routes([
            'index'   => ['name' => 'anuncios.index'],
            'show' => ['name' => 'anuncios.show'],
            'create'  => ['name' => 'anuncios.create'],
            'edit'    => ['name' => 'anuncios.edit'],
            'destroy' => ['name' => 'anuncios.confirm'],
        ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('anuncio_titulo')->title(__('Title'))->sortable()->searchable();
        $table->column('created_at')->title(__('Created'))->sortable()->searchable();
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}
