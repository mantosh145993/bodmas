<?php

namespace App\Imports;

use App\Models\Medical;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use Hash;
  
class CutoffImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);die;
        return new Medical([
            'college_name' => $row['college_name'],
            'fee'    => $row['fee'],
            'course'     => $row['course'],
            'category'    => $row['category'],
            'rank'    => $row['rank'],
            'round'    => $row['round'],
            'quota'    => $row['quota'],
            'state_id'    => $row['state'],
            'type'    => $row['type'],
            'seat_type' =>$row['seat_type'],
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
}
