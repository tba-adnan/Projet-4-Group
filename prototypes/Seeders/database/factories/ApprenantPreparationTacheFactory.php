<?php

namespace Database\Factories;

use App\Models\apprenant;
use App\Models\apprenant_preparation_brief;
use App\Models\apprenant_preparation_tache;
use App\Models\preparation_tache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\apprenant_preparation_tache>
 */
class ApprenantPreparationTacheFactory extends Factory
{
    protected $model=apprenant_preparation_tache::class;
    public function definition()
    {
        $preparationTache =preparation_tache::all()->pluck('id')->toArray();
        $ApprenantPreparationBrief =apprenant_preparation_brief::all()->pluck('id')->toArray();
        $apprenant =apprenant::all()->pluck('id')->toArray();

        return [
            "Preparation_tache_id"=>$this->faker->randomElement($preparationTache),
            "Apprenant_id"=>$this->faker->randomElement($apprenant),
            "Apprenant_P_Brief_id"=>$this->faker->randomElement($ApprenantPreparationBrief),
            "Etat"=>$this->faker->randomElement(['en pause', 'terminer', 'en cours']) ,
            "date_debut"=>$this->faker->date(),
            "date_fin"=>$this->faker->date(),
        ];
    }
}
