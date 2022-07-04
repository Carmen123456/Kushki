<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Causa;
use App\Models\User;

class Cliente extends Model
{
    protected $table ="clientes";
    protected $primaryKey="idCliente";
    protected $fillable = ['nombreRazon','nombreConsola','nombreZendesk','categria', 'taxId','idComercio','pais','state','nombreContacto',
'emailContacto','merchanturl','tipoContacto','personaContacto','personaEmmail','telefonoWeb','emailWeb','chatWeb','user_id'];
    
/**
 * Get the user associated with the Cliente
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */

public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
