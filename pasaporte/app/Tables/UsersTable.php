<?php

namespace App\Tables;

use App\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends AbstractTable
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
        return (new Table)->model(User::class)
            ->routes([
                'index'   => ['name' => 'users.index'],
                'show' => ['name' => 'users.show'],
                'create'  => ['name' => 'users.create'],
                'edit'    => ['name' => 'users.edit'],
                'destroy' => ['name' => 'users.confirm'],
            ])
            ->query(function (Builder $query) {
                $query->select('users.*');
                $query->addSelect('carreras.carrera_nombre as carrera');
                $query->addSelect('roles.name as role_nombre');
                $query->join('carreras', 'carreras.id', '=', 'users.carrera_id');
                $query->join('role_user', 'users.id', '=', 'role_user.user_id');
                $query->join('roles', 'role_user.role_id', '=', 'roles.id');
                //$query->where('role_id', 2);
                $query->where('user_id', '!=', $this->user_id);
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
        $table->column('name')->title(__('Name'))->sortable()->searchable();
        $table->column('email')->title(__('Email'))->sortable()->searchable();
        $table->column('carrera')->title(__('Career'))->sortable()->searchable('carreras', ['carrera_nombre']);
        $table->column('semestre')->title(__('Semester'))->sortable()->searchable();
        $table->column('role_nombre')->title(__('Rol'))->sortable();
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
