<?php

namespace Database\Factories;

use App\Models\ApprenantPreparationBrief;
use App\Models\Groupes;
use App\Models\GroupesPreparationBrief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes_preparation_brief>
 */
class GroupesPreparationBriefFactory extends Factory
{
    protected $model=GroupesPreparationBrief::class;
    public function definition()
    {
        $ApprenantPreparationBrief =ApprenantPreparationBrief::all()->pluck('id')->toArray();
        $groupe =Groupes::all()->pluck('id')->toArray();
        return [
            "Apprenant_preparation_brief_id"=>$this->faker->randomElement($ApprenantPreparationBrief),
            "Groupe_id"=>$this->faker->randomElement($groupe),
        ];
    }
}
