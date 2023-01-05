<?php

namespace App\Imports;

use App\Models\groupes;
use Maatwebsite\Excel\Concerns\ToModel;

class GroupImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new groupes([
            'Logo' => $row[1], 
                'Nom_groupe'  => $row[2],
        ]);
    }
}
