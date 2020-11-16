<?php

namespace App\Tables;

use App\Clase;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class ClaseTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(Clase::class)
            ->routes([
                'index'   => ['name' => 'clases.index'],
                'show' => ['name' => 'clases.show'],
                'create'  => ['name' => 'clases.create'],
                'edit'    => ['name' => 'clases.edit'],
                'destroy' => ['name' => 'clases.confirm'],
            ])
            ->query(function (Builder $query) {
                $query->select('clases.*');
                $query->addSelect('coaches.coach_nombre as coach');
                $query->join('coaches', 'coaches.id', '=', 'clases.coach_id');
                $query->selectRaw('GROUP_CONCAT(dia_nombre ORDER BY dias.id ASC separator ", ") as "dias"');
                $query->join('clase_dia', 'clase_dia.clase_id', '=', 'clases.id');
                $query->join('dias', 'dias.id', '=', 'clase_dia.dia_id');
                $query->groupByRaw('clase_nombre, coach_nombre, clase_hora_inicio, clase_hora_fin, clases.id, clases.coach_id, clases.created_at, clases.updated_at');
            });
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
        $table->column('clase_nombre')->title(__('Name'))->sortable()->searchable();
        $table->column('clase_hora_inicio')->title(__('Start hour'))->dateTimeFormat('g:i A')->sortable()->searchable();
        $table->column('clase_hora_fin')->title(__('End hour'))->dateTimeFormat('g:i A')->sortable()->searchable();
        $table->column('coach')->title(__('Coach'))->sortable()->searchable('coaches', ['coach_nombre']);
        $table->column('dias')->title(__('Days'))->sortable();
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
