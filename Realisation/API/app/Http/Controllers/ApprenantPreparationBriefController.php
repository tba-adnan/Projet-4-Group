<?php

namespace App\Http\Controllers;
use App\Models\PreparationBrief;
use App\Models\groupes;
use App\Models\apprenant;
use App\Models\GroupesApprenant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprenantPreparationBriefController extends Controller
{
    public function index()
    {
        $brief=PreparationBrief::all();
        $promo=groupes::all();
        $apprenants=apprenant::paginate(5);
        return view('assign.index',['brief'=>$brief,'promo'=>$promo,'apprenants'=>$apprenants]);
    }

    public function filter_par_group(Request $request)
    {
        $id_groupe = GroupesApprenant::where('Groupe_id','Like','%'.$request->filter.'%')->get();
        // dd($apprenants_id);

        // $apprenants = apprenant::where('id','Like','%'.$apprenants_id.'%')->get();
        
        $apprenants = DB::table('apprenant')
            ->selectRaw(
                'apprenant.Nom, 
                apprenant.Prenom
                apprenant.id',
            )

            ->join('GroupesApprenant', 'GroupesApprenant.Apprenant_id', '=', 'apprenant.id')
            ->where('GroupesApprenant.Groupe_id', '=' , $id_groupe)
            
            ->get();
            return response(['apprenants'=>$apprenants]);
            //  return $result;

    }

}
