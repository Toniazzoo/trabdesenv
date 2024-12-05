<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospede extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cpf', 'data_nascimento', 'descricao'
    ];

    // Relacionamento inverso: um hospede pode ter muitas hospedagens
    public function hospedagens()
    {
        return $this->hasMany(Hospedagem::class);
    }
}

?>