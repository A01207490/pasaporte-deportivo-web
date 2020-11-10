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
        return Sesion::getAllSesions()->get();
    }
}
