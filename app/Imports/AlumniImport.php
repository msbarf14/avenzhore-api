<?php

namespace App\Imports;

use App\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumniImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumni([
            'user_id'           => $row[0],
            'full_name'         => $row[1],
            'master_number'     => $row[2],
            'birthplace'        => $row[3],
            'dateplace'         => $row[4],
            'fathers_name'      => $row[5],
            'mothers_name'      => $row[6],
            'address'           => $row[7],
            'entry_year'        => $row[8],
            'hp'                => $row[9],
            'whatsapp'          => $row[10],
            'facebook'          => $row[11],
            'instagram'         => $row[12],
            'accepted_class'    => $row[13],
            'word'              => $row[11],
        ]);
    }
}
