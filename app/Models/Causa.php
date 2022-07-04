<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Causa extends Model
{
    protected $table ="causa";
    protected $primaryKey="idCausa";
    public $timestamps = false;
    protected $fillable = ['fecha','nombreAgente','ticket','motivo','idClienteFK'];
        
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idClienteFK');
    }
}

