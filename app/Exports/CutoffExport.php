<?php

namespace App\Exports;

use App\Models\Medical;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CutoffExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Medical::select("college_id","college_name","course","category","rank","round")->get();
    }

    public function headings(): array
    {
        return ["ID", "COLLEGE NAME","COURSE","CATEGORY","RANK","ROUND"];
    }
}
