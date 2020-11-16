<?php

namespace App\Exports;

use App\Coach;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoachesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Coach::getCoachExport();
    }
}
