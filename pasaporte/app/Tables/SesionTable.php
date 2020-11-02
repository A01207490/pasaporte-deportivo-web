<?php

namespace App\Tables;

use App\Sesion;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class SesionTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(Sesion::class)
            ->routes([
                'index'   => ['name' => 'sesions.index'],
                'create'  => ['name' => 'sesion.create'],
                'edit'    => ['name' => 'sesion.edit'],
                'destroy' => ['name' => 'sesion.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Sesion $sesion) => [
                'data-confirm' => __('Are you sure you want to delete the line ' . $sesion->database_attribute . ' ?'),
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
        $table->column('database_attribute')->sortable()->searchable();
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
