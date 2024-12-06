<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospedagensTable extends Migration
{
    public function up()
    {
        Schema::create('hospedagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospede_id')->constrained('hospedes')->onDelete('cascade');  // Relacionamento com a tabela hospedes
            $table->foreignId('quarto_id')->constrained('quartos')->onDelete('cascade');  // Relacionamento com a tabela hospedes
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospedagens');
    }
}

