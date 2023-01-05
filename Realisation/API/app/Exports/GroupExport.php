<?php

namespace App\Exports;

use App\Models\Groupes;
use Maatwebsite\Excel\Concerns\FromCollection;

class GroupExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Groupes::all();
    }
}
