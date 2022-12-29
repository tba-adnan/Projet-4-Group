<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ApprenantPreparationBrief;
use App\Models\GroupesApprenant;
use App\Models\PreparationBrief;

class ApprenantPreparationBriefController extends Controller
{

    public function store(Request $request)
    {
        if (is_null(PreparationBrief::find($request->Preparation_brief_id)->briefsApprenant()->find($request->Apprenant_id))) {

            $assign = ApprenantPreparationBrief::create([
                'Apprenant_id' => $request->Apprenant_id,
                'Preparation_brief_id' => $request->Preparation_brief_id
            ]);
        }
        return back();
    }

}
