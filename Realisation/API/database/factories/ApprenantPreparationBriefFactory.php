<?php

namespace Database\Factories;


use App\Models\Apprenant;
use App\Models\ApprenantPreparationBrief;
use App\Models\PreparationBrief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\apprenant_preparation_brief>
 */
class ApprenantPreparationBriefFactory extends Factory
{
 
    protected $model=ApprenantPreparationBrief::class;
    public function definition()
    {
        $preparationBrief =PreparationBrief::all()->pluck('id')->toArray();
        $apprenant =  Apprenant::all()->pluck('id')->toArray();
        return [
            "Date_affectation"=>$this->faker->date(),
            "Preparation_brief_id"=>$this->faker->randomElement($preparationBrief),
            "Apprenant_id"=>$this->faker->randomElement($apprenant),
        ];
    }
}
