<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre_cli', 'email_cli', 'cedula', 'celu_cli'];
}
