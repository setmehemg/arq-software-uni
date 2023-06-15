<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';

    protected $fillable = [
        'eventos_id',
        'users_id'
    ];

    public function eventos()
    {
        return $this->belongsTo(Eventos::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
}
