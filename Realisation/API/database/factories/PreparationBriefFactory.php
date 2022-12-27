<?php

namespace Database\Factories;

use App\Models\formateur;
use App\Models\preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\preparation_brief>
 */
class PreparationBriefFactory extends Factory
{
    protected $model=preparation_brief::class;
    public function definition()
    {
        $formateur =formateur::all()->pluck('id')->toArray();
        return [
            "Nom_du_brief"=>$this->faker->name(),
            "Description"=>$this->faker->word() ,
            "Duree"=>$this->faker->randomNumber(1),
            "Formateur_id"=>$this->faker->randomElement($formateur),
        ];
    }
}
