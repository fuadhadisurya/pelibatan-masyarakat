<?php

namespace App\Exports;

use App\Models\DataPresensiEvent;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiEventExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPresensiEvent::all();
    }
}
