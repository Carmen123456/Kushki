<?php

namespace App\Imports;

use App\Models\Causa;
use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
class CausaImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
private  $clientes;
public function __construct(){
    $this->clientes = Cliente::pluck('idCliente','nombreZendesk');
}
    public function model(array $row)
    {
        return new Causa([
           'fecha' => ($row['fecha']== null)?'Sin fecha': $row['fecha'],
           'nombreAgente' => ($row['nombre_del_agente']== null)?'Sin agente': $row['nombre_del_agente'], 
           'ticket' => ($row['ticket']== null)?'Sin ticket': $row['ticket'],
           'motivo' => ($row['motivo']== null)?'Sin motivo': $row['motivo'],
           'idClienteFK'=>$this->clientes[$row['comercio']]
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }

}
