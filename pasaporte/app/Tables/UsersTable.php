<?php

namespace App\Tables;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class UsersTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(User::class)
            ->routes([
                'index'   => ['name' => 'users.index'],
                'show' => ['name' => 'users.show'],
                //'create'  => ['name' => 'user.create'],
                //'edit'    => ['name' => 'user.edit'],
                'destroy' => ['name' => 'users.confirm'],
            ])
             /*
                $query->where('role_id', 2);
                $query->join('role_user', 'users.id', '=', 'role_user.user_id');
                $query->join('carreras', 'users.carrera_id', '=', 'carreras.id');
                $query->join('roles', 'role_user.role_id', '=', 'roles.id');
                $query->select('users.id', 'roles.name', 'users.name', 'users.email', 'users.semestre', 'carreras.carrera_nombre');
            */
            ->query(function (Builder $query) {
                // Some examples of what you can do
                $query->select('users.*');
                // Alias a value to make it available from the column model
                $query->addSelect('carreras.carrera_nombre as carrera');
                $query->join('carreras', 'carreras.id', '=', 'users.carrera_id');

                $query->join('role_user', 'users.id', '=', 'role_user.user_id');
                $query->where('role_id', 2);
               
            })
            ->destroyConfirmationHtmlAttributes(fn(User $user) => [
                'data-confirm' => __('Are you sure you want to delete the line ' . $user->database_attribute . ' ?'),
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
        $table->column('name')->title(__('Name'))->sortable()->searchable();
        $table->column('email')->title(__('Email'))->sortable()->searchable();
        $table->column('carrera')->title(__('Career'))->sortable()->searchable('carreras', ['carrera_nombre']);
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
