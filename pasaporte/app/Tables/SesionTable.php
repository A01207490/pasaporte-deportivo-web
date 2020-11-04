<?php

namespace App\Tables;

use App\Sesion;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class SesionTable extends AbstractTable
{
    protected int $user_id;

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }
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
                'index' => ['name' => 'sesions.show', 'params' => ['sesion' => $this->user_id]],
                'create'  => ['name' => 'sesions.create', 'params' => ['user' => $this->user_id]],
                'destroy' => ['name' => 'sesions.confirm'],
            ])

            ->query(function (Builder $query) {
                $query->select('clase_user.id', 'clase_user.created_at', 'users.name', 'users.email', 'clases.clase_nombre', 'clases.clase_hora_inicio', 'clases.clase_hora_fin', 'coaches.coach_nombre', 'coaches.coach_nomina', 'coaches.coach_correo');
                $query->join('clases', 'clase_user.clase_id', '=', 'clases.id');
                $query->join('users', 'clase_user.user_id', '=', 'users.id');
                $query->join('coaches', 'clases.coach_id', '=', 'coaches.id');
                $query->where('user_id', $this->user_id);
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
        $table->column('clase_nombre')->title(__('Class'))->sortable()->searchable('clases', ['clase_nombre']);
        $table->column('created_at')->title(__('Registered'))->dateTimeFormat('j-M-y g:i A')->sortable()->searchable('users', ['email']);
        $table->column('coach_nombre')->title(__('Coach'))->sortable()->searchable('coaches', ['coach_nombre']);
        $table->column('clase_hora_inicio')->title(__('Start hour'))->dateTimeFormat('g:i A')->sortable()->searchable('clases', ['clase_hora_inicio']);
        $table->column('clase_hora_fin')->title(__('End hour'))->dateTimeFormat('g:i A')->sortable()->searchable('clases', ['clase_hora_fin']);
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
