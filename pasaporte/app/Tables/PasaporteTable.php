<?php

namespace App\Tables;

use App\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class PasaporteTable extends AbstractTable
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
            'index'   => ['name' => 'sesions.index'],
            'show' => ['name' => 'sesions.show'],
        ])

        ->query(function (Builder $query) {
            $query->select('name');
            $query->addSelect('users.id as id');
            $query->addSelect('users.email as email');
            $query->selectRaw('count(clase_user.user_id) as sesion_completed');
            $query->leftJoin('clase_user', 'clase_user.user_id', '=', 'users.id');
            $query->join('role_user', 'role_user.user_id', '=', 'users.id');
            $query->where('role_id', 2);
            $query->groupByRaw('name, users.id, users.email');
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
        $table->column('name')->title(__('Name'))->sortable()->searchable('users', ['name']);
        $table->column('email')->title(__('Email'))->sortable()->searchable('users', ['email']);
        $table->column('sesion_completed')->title(__('Sessions'))->sortable();
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
