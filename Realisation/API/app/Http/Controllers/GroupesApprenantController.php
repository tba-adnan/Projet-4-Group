<?php

namespace App\Http\Controllers;

use App\Models\PreparationBrief;
use App\Models\groupes;
use App\Models\apprenant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ApprenantPreparationBrief;
use App\Models\GroupesApprenant;



class GroupesApprenantController extends Controller
{
    public function index()
    {
        $promo=groupes::all();
        $brief=PreparationBrief::all();
        $apprenants=apprenant::paginate(5);
        return view('assign.index',['brief'=>$brief,'promo'=>$promo,'apprenants'=>$apprenants]);
    }

    public function filter_par_group(Request $request)
    {    
        $apprenants = DB::table('apprenant')
        ->select("*" )
            ->join('groupes_apprenant', 'apprenant.id', '=', 'groupes_apprenant.apprenant_id')
            ->join('Groupes', 'groupes_apprenant.Groupe_id', '=', 'Groupes.id')
            ->where('Groupes.id','Like','%'.$request->filter.'%')
            ->get();
        return response(['apprenants'=>$apprenants]);
    }


}
