<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


use Throwable, customValidationMessages;

class ClienteImport implements ToModel, WithHeadingRow, SkipsEmptyRows,SkipsOnError, WithCustomCsvSettings
{
use Importable,SkipsErrors;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Cliente([
            'nombreRazon' => $row['nombre_comercio_razon_social'],
            'nombreConsola' => $row['nombre_en_consola'],
            'nombreZendesk' => $row['nombre_en_zendesk'],
            'categria' => $row['categoria'],
            'taxId' => $row['taxid'],
            'idComercio' =>  $row['publicmerchantid'],
            'pais'=> $row['city'],
            'state'=> ($row['state']== 'Active') ? 1 : 0,
            'nombreContacto'=> $row['contactperson'],
            'emailContacto'=> $row['email'],
            'merchanturl'=> $row['merchanturl'],
            'tipoContacto'=> $row['tipo_de_contacto'],
            'personaContacto'=> $row['nombre_de_contacto'],
            'personaEmmail'=> $row['email_de_contacto'],
            'telefonoWeb'=> $row['telefono_de_contacto'],
            'emailWeb'=> $row['correo'],
            'chatWeb'=> ($row['chat_en_pagina_web']== 'Si aplica') ? 1 : 0,
            'user_id'=> auth()->id()
        ]);
    }
  
    public function onError(Throwable $e)
    {
    
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }

}
