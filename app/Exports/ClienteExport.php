<?php

namespace App\Exports;
use DB;
use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'nombreRazon',
            'nombreConsola',
            'nombreZendesk',
            'categria',
            'taxId',
            'idComercio',
            'pais',
            'state',
            'nombreContacto',
            'emailContacto',
            'merchanturl',
            'tipoContacto',
            'personaContacto',
            'personaEmmail',
            'telefonoWeb',
            'emailWeb',
            'chatWeb'
        ];
    }
    public function collection()
    {
        $cliente= Cliente::select( 'nombreRazon',
        'nombreConsola',
        'nombreZendesk',
        'categria',
        'taxId',
        'idComercio',
        'pais',
        'state',
        'nombreContacto',
        'emailContacto',
        'merchanturl',
        'tipoContacto',
        'personaContacto',
        'personaEmmail',
        'telefonoWeb',
        'emailWeb',
        'chatWeb'
        )->where('state','=',true)->get();
        return $cliente;
    }
 

}
