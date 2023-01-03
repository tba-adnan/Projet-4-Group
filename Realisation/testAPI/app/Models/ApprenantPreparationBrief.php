<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprenantPreparationBrief extends Model
{
    use HasFactory;
    protected $table = "apprenant_preparation_brief";
    public $timestamps= false;
    protected $fillable = [
    "Date_affectation",
    "Preparation_brief_id",
    "Apprenant_id"
    ];
}
