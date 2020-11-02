<?php

namespace App\Tables;

use App\Coach;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class CoachTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(Coach::class)
            ->routes([
                'index'   => ['name' => 'coaches.index'],
                'show' => ['name' => 'coaches.show'],
                'create'  => ['name' => 'coaches.create'],
                'edit'    => ['name' => 'coaches.edit'],
                'destroy' => ['name' => 'coaches.confirm'],
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
        $table->column('clase_nombre')->title(__('Name'))->sortable()->searchable();
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
