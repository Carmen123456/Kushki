<?php

namespace App\Exports;

use App\Models\Asignacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class AsignacionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'idAsignacion',
            'Kam',
            'categoria',
            'cliente_id',
            'user_id'
            

        ];
    }
    public function collection()
    {
        return Asignacion::select( 'idAsignacion',
        'Kam',
        'categoria',
        'cliente_id',
        'user_id'
        )->get();
    }
}
