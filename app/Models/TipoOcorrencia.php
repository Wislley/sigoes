<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOcorrencia extends Model
{
    use HasFactory;

    protected $table = 'tipos_ocorrencias';
    protected $guarded = [];
}
