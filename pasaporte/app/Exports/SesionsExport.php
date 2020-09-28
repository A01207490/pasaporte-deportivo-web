<?php

namespace App\Exports;

use App\Sesion;
use Maatwebsite\Excel\Concerns\FromCollection;

class SesionsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        /*
        $users = User::whereIn('id', function ($query) {
            $query->select('user_id')->from('sesions');
        })->paginate(10);
        */
        return Sesion::join('clases', 'sesions.clase_id', '=', 'clases.id')->join('users', 'sesions.user_id', '=', 'users.id')->join('coaches', 'clases.coach_id', '=', 'coaches.id')->select('sesions.created_at', 'users.name', 'users.email', 'clases.clase_nombre', 'clases.clase_hora_inicio', 'clases.clase_hora_fin', 'coaches.coach_nombre', 'coaches.coach_nomina', 'coaches.coach_correo')->get();
    }
}
