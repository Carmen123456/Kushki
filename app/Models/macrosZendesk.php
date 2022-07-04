<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class macrosZendesk extends Model
{
    protected $table ="macrosZendesk";
    protected $primaryKey="idMacroZendesk";


    public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
