<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "agendamentos";

    protected $fillable = [
        "cliente",
        "email",
        "animal",
        "servico",
        "data",
        "status"
    ];
}
