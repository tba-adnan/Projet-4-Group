<?php

namespace Database\Factories;

use App\Models\anne_formation;
use App\Models\formateur;
use App\Models\groupes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes>
 */
class GroupesFactory extends Factory
{
    protected $model=groupes::class;
    public function definition()
    {
        $formateur =formateur::all()->pluck('id')->toArray();


        $annee_formation =anne_formation::all()->pluck('id')->toArray();


        return [
            "Nom_groupe"=>$this->faker->name(),
            "Annee_formation_id"=>$this->faker->randomElement($annee_formation),
            'Formateur_id'=> $this->faker->randomElement($formateur),

            "Logo"=>$this->faker->imageUrl(true, 'Faker',true),
        ];
    }
}
