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
        // dd($row);
        return new Medical([
            'college_name'     => $row['college_name'],
            'course'     => $row['course'],
            'category'    => $row['category'],
            'rank'    => $row['rank'],
            'round'    => $row['round'],
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function rules(): array
    // {
    //     return [
    //         'college_name' => 'required',
    //         'college_name' => 'required|min:5',
    //         'category' => 'required',
    //         'round' => 'round',
    //         'rank' => 'rank'
    //     ];
    // }
}
