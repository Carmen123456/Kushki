<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class macrosIntercom extends Model
{
    protected $table ="macrosIntercom";
    protected $primaryKey="idMacroIntercom";
    public $timestamps = false;

    public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
