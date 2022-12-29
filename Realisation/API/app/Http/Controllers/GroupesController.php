<?php

namespace App\Http\Controllers;

use App\Models\PreparationBrief;
use Illuminate\Http\Request;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use App\Models\Formateur;
use App\Models\Groupes;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class GroupesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatuers=Formateur::all();
        $groupes =Groupes::paginate(3);
        return view('groupes.index',compact('formatuers','groupes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brief=PreparationBrief::all();
        return view('tasks.create',['brief'=>$brief]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nom_tache'=>'required|max:50',
            'Duree'=>'required'
        ]);
        Groupes::create([

            'Nom_tache'=>$request->Nom_tache,
            'Description'=>$request->Description,
            'Duree'=>$request->Duree,
            'Preparation_brief_id'=>$request->Preparation_brief_id
        ]);

        return to_route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Groupes::findOrFail($id);
        $brief=PreparationBrief::all();
        return view('tasks.edit',['edit'=>$edit,'brief'=>$brief]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom_tache'=>'required|max:50',
            'Duree'=>'required'
        ]);
        $update=Groupes::findOrFail($id);
        $update->Nom_tache=$request->get('Nom_tache');
        $update->Description=$request->get('Description');
        $update->Duree=$request->get('Duree');
        $update->Preparation_brief_id=$request->get('Preparation_brief_id');
        $update->save();


        return redirect('/task')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Groupes::findOrFail($id);
        $delete->delete();
        return redirect('/task');
    }

     // export data format excel

     public function exportexcel(){
        return Excel::download(new TaskExport,'datapage.xlsx');
    }

     // import data format excel
     public function importexcel(Request $request){

        Excel::import(new TaskImport, $request->file);
        return redirect()->back();

    }

    //  Export data form PDF

    public function generatepdf(){

        $groupes = Groupes::all();
        $pdf = Pdf::loadView('pdf.groupes', compact('groupes'));
        return $pdf->download('groupes.pdf');
    }
    
        public function filter_bief(Request $request){
            $task=Groupes::where('Preparation_brief_id','Like','%'.$request->filter.'%')->get();
            return response(['dataTask'=>$task]);
        }
    
        public function search_tache(Request $request){
            $searchtask=Groupes::where('Nom_tache','Like','%'.$request->searchtask.'%')->get();
            return response(['search'=>$searchtask]);
    
        }

}
