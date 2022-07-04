<?php

namespace App\Exports;

use App\Models\macrosIntercom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class macrosIntercomB2BExport implements FromCollection,WithHeadings
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'idMacroIntercom',
            'mensaje',
            'categoria',
            'grupo'
        ];
    }
    public function collection()
    {
        return macrosIntercom::select(   'idMacroIntercom',
        'mensaje',
        'categoria',
        'grupo')->where('grupo','=',true)->get();
    }
}
