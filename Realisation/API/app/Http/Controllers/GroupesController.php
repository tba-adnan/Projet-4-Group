<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GroupExport;
use App\Imports\GroupImport;
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
        $formatuer=Formateur::all();
        return view('groupes.create', compact('formatuer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'Nom_groupe'=>'required',
        //     'Annee_formation'=>'required'
        // ]);
        if($request->has('Logo')){
            $file=$request->Logo;
            $Logo=time(). '_' .$file->getClientOriginalName();
            $file->move(public_path('img'),$Logo);
            }
        Groupes::create([

            'Nom_groupe'=>$request->Nom_groupe,
            'Annee_formation_id'=>$request->Annee_formation,
            'Logo'=>$Logo
        ]);

        return redirect('group');
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
        $formatuere=Formateur::all();
        return view('groupes.edit', compact('formatuere','edit'));
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
        // $request->validate([
        //     'Nom_groupe'=>'required|max:50',
        //     'Duree'=>'required'
        // ]);
        $update=Groupes::findOrFail($id);
        $update->Logo=$request->get('Logo');
        $update->Nom_groupe=$request->get('Nom_groupe');
        $update->Annee_formation_id=$request->get('Annee_formation');
        $update->save();


        return redirect('/group')->with('success');
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
        return redirect('/group');
    }

     // export data format excel

     public function exportexcel(){
        return Excel::download(new GroupExport,'datapage.xlsx');
    }

     // import data format excel
     public function importexcel(Request $request){

        Excel::import(new GroupImport, $request->file);
        return redirect()->back();

    }

    //  Export data form PDF

    public function generatepdf(){

        $groupes = Groupes::all();
        $pdf = Pdf::loadView('pdf.groups', compact('groupes'));
        return $pdf->download('groups.pdf');
    }
    
        public function filter_formatuer(Request $request){
            $task=Groupes::where('Preparation_brief_id','Like','%'.$request->filter.'%')->get();
            return response(['dataTask'=>$task]);
        }
    
        public function search_group(Request $request){
            $searchtask=Groupes::where('Nom_tache','Like','%'.$request->searchtask.'%')->get();
            return response(['search'=>$searchtask]);
    
        }

}
