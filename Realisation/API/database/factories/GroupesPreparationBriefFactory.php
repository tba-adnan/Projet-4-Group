<?php

namespace Database\Factories;

use App\Models\apprenant_preparation_brief;
use App\Models\groupes;
use App\Models\groupes_preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes_preparation_brief>
 */
class GroupesPreparationBriefFactory extends Factory
{
    protected $model=groupes_preparation_brief::class;
    public function definition()
    {
        $ApprenantPreparationBrief =apprenant_preparation_brief::all()->pluck('id')->toArray();
        $groupe =groupes::all()->pluck('id')->toArray();
        return [
            "Apprenant_preparation_brief_id"=>$this->faker->randomElement($ApprenantPreparationBrief),
            "Groupe_id"=>$this->faker->randomElement($groupe),
        ];
    }
}
