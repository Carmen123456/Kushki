<?php

namespace App\Exports;

use App\Models\Causa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CausaExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'idCausa',
            'Fecha',
            'Agente',
            'Ticket',
            'motivo',
            'idCliente'
        ];
    }
    public function collection()
    {
        $cliente= Causa::with('cliente')->get();
        return $cliente;
    }
 
}
