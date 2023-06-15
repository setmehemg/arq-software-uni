<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'nome',
        'descricao',
        'data_inicial',
        'data_final',
        'lugares',
    ];

    /*
    protected $casts = [
        'is_active' => 'boolean',
    ];
    */
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'eventos_id');
    }

}
