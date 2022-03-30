<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const TURNO_MANHA = 1;
    public const TURNO_TARDE = 2;
    public const TURNO_NOITE = 3;

    public const turnos = [
        self::TURNO_MANHA => 'Manhã',
        self::TURNO_TARDE => 'Tarde',
        self::TURNO_NOITE => 'Noite',
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function tipoOcorrencia()
    {
        return $this->belongsTo(TipoOcorrencia::class);
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }
}
