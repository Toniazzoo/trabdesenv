<?php

namespace Database\Factories;

use App\Models\Hospede;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class HospedeFactory extends Factory
{
    /**
     * O nome do modelo que esta fábrica representa.
     *
     * @var string
     */
    protected $model = Hospede::class;

    /**
     * Defina o estado padrão do modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'), // Gerar CPF
            'data_nascimento' => $this->faker->date(),
            'descricao' => $this->faker->sentence,
        ];
    }
}
