<?php

namespace Database\Factories;

use App\Models\apprenant;
use App\Models\apprenant_preparation_brief;
use App\Models\preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\apprenant_preparation_brief>
 */
class ApprenantPreparationBriefFactory extends Factory
{
 
    protected $model=apprenant_preparation_brief::class;
    public function definition()
    {
        $preparationBrief =preparation_brief::all()->pluck('id')->toArray();
        $apprenant =apprenant::all()->pluck('id')->toArray();
        return [
            "Date_affectation"=>$this->faker->date(),
            "Preparation_brief_id"=>$this->faker->randomElement($preparationBrief),
            "Apprenant_id"=>$this->faker->randomElement($apprenant),
        ];
    }
}
