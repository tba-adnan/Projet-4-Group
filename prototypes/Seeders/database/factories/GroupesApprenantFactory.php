<?php

namespace Database\Factories;

use App\Models\apprenant;
use App\Models\groupes;
use App\Models\groupes_apprenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes_apprenant>
 */
class GroupesApprenantFactory extends Factory
{
    protected $model=groupes_apprenant::class;
    public function definition()
    {
        $apprenant =apprenant::all()->pluck('id')->toArray();


        $groupe =groupes::all()->pluck('id')->toArray();

        return [
            "Groupe_id"=>$this->faker->randomElement($groupe),
           "Apprenant_id"=>$this->faker->randomElement($apprenant),
        ];
    }
}
