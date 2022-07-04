<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TipoUsuario extends Model
{
    //use HasFactory;
    protected $table ="tipousuario";
    protected $primaryKey="idTipoUsuario";
    
    public $timestamps = false;
   


   
}
