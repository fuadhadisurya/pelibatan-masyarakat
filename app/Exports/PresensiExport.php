<?php

namespace App\Exports;

use App\Models\DataPresensi;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPresensi::all();
    }
}
