<?php

// app/Models/Hospedagem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedagem extends Model
{
    use HasFactory;

    protected $table = 'hospedagens';

    protected $fillable = [
        'hospede_id',
        'data_inicio',
        'data_fim',
    ];

    // Definindo o relacionamento 'hospede' - uma hospedagem pertence a um hospede
    public function hospede()
    {
        return $this->belongsTo(Hospede::class);
    }

}
