<?php

namespace App\Exports;

use App\Clase;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClasesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Clase::getClassExport();
    }
}
