<?php

namespace App\Exports;

use App\Models\macrosZendesk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class macrosZendeskExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'idMacroZendesk',
'respuesta',
'nombrePlantilla',
'aplicativo',
'fechaActualizacion',
'estadoMacros',
'grupo'
        ];
    }
    public function collection()
    {
        return macrosZendesk::select(  'idMacroZendesk',
        'respuesta',
        'nombrePlantilla',
        'aplicativo',
        'fechaActualizacion',
        'estadoMacros',
        'grupo')->where('grupo','=',true)->get();
    }
}
