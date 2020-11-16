<?php

namespace App\Exports;

use App\Anuncio;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnunciosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anuncio::getAnnouncementExport();
    }
}
