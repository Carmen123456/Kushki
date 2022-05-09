<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table ="asignacion";
    protected $primaryKey="idAsignacion";
    public $timestamps = false;

    public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function cliente()
{
    return $this->belongsTo(Cliente::class, 'cliente_id');
}
}
