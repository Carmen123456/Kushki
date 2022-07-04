<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteInactivosExport implements FromCollection, WithHeadings
{
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
        )->where('state','=',false)->get();
        return $cliente;
    }
 
}
