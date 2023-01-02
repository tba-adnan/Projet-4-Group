<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PreparationBrief;
use App\Models\groupes;
use App\Models\apprenant;
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
    
    // public function getDateAttribute($value)
    // {
    //     $date = date('Y-m-d',strtotime($value));
    //     return $date;   // return  2023-01-02
    // }
    
    public function form_save(Request $request)
    {           
        $Date_affectation= $timestamps();
        
        foreach($request->checkbox as $key=>$name){

            $assign = ApprenantPreparationBrief::create([
                'Apprenant_id' => $request->Apprenant_id,
                'Preparation_brief_id' => $request->Preparation_brief_id
            ]);

            // $insert =[
            //     'Apprenant_id' =>$request->checkbox[$key],
            // ];
            // DB::table('apprenant_preparation_brief')->insert('$insert');
        }

        return redirect()->back();
    }
}
