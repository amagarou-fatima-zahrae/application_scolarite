<?php

namespace App\Http\Controllers;

use App\Models\Attestation_scolarite;
use App\Models\Demande_doc;
use Exception;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Releve_note;
use App\Models\Convention_stage;
use Attribute;

class verifyStudent extends Controller
{
    public function StudentForm(){
        return view('userViews.updatePasswordForm');
    }
    public function verifyStudentForm(Request $request){
        $request->validate(['codeApogee'=>['bail', 'required'], 
        'emailStudent'=>['bail', 'required', 'email'],
        'cne'=>['bail', 'required',],
        'choix'=>['bail', 'required']
    ]);
        $etudiant=Etudiant::where('code_apogee', $request->codeApogee)->firstOr(function(){
            return back()->withErrors([
                'failed' => 'Les données que vous avez entrées ne correspondent aux données enregitrées dans notre base de donnée',
            ]);

        });
        try{
            if($etudiant->code_apogee == $request->codeApogee && $etudiant->email_etudiant == $request->emailStudent && $etudiant->cne == $request->cne){
               // dd("choix=", $request->choix);
                switch($request->choix){
                    case "releveNote":
                       
                        $request->validate(['niveau'=>['bail', 'required'], 
                        'semestre'=>['bail', 'required'],
                        'anneeUnivR'=>['bail', 'required']
                        ]);
                        //dd($request);
                        $releve=Releve_note::create(['niveau'=>$request->niveau, 'semestre'=>$request->semestre]);
                        //dd($releve);
                        Demande_doc::create(['id_demande' => $releve->id, 'id_etudiant' => $etudiant->id, 'type_demande' => "releve de notes", 'status' => "en cours", 'is_archive' => 0, 'date_demande'=>date('d/m/Y'), 'annee_univ'=>$request->anneeUnivR]);
                        

                        break;
                    case "attestaScolarite":
                        $request->validate(['niveauA'=>['bail', 'required'], 
                        'anneeUnivA'=>['bail', 'required']
                        ]);
                        //dd($request->niveau);
                        $scolarite=Attestation_scolarite::create(['niveau'=>$request->niveauA]);
                        Demande_doc::create(['id_demande' => $scolarite->id, 'id_etudiant' => $etudiant->id, 'type_demande' => "attestation scolarite", 'status' => "en cours", 'is_archive' => 0, 'date_demande'=>date('d/m/Y'), 'annee_univ'=>$request->anneeUnivA]);
                        break;
                    case "conventionDeStage":
                        //dd("hihihihihhiihihhi3");

                        $request->validate(['companyName'=>['bail', 'required'], 
                        'encadrantName'=>['bail', 'required'],
                        'encadrantNameSchool'=>['bail', 'required'],
                        'director'=>['bail', 'required'],
                        'startDate'=>['bail', 'required'],
                        'companyEmail'=>['bail', 'required', 'email'],
                        'addressCompany'=>['bail', 'required'],
                        'telCompany'=>['bail', 'required'],
                        'assistantPedag'=>['bail', 'required'],
                        'stageTheme'=>['bail', 'required'],
                        'endDate'=>['bail', 'required'],
                        'accordCompany'=>['bail', 'required'],
                        'assurance'=>['bail', 'required'],
                        'logoCompany'=>['bail', 'required', 'image']
                        ]);
                        $fileName1=time().'.'.$request->accordCompany->extension();
                        $fileName2=time().'.'.$request->assurance->extension();
                        $fileName3=time().'.'.$request->logoCompany->extension();
                        $path1=request('accordCompany')->storeAs('accordCompanies', $fileName1, 'public');
                        $path2=request('assurance')->storeAs('assurances', $fileName2, 'public');
                        $path3=request('logoCompany')->storeAs('logoCompanies', $fileName3, 'public');
                        $conventionStage=Convention_stage::create(['nom_entreprise'=>$request->companyName,'encadrant_entreprise'=>$request->encadrantName,'encadrant_ecole'=>$request->encadrantNameSchool,'directeur'=>$request->director,'sujet'=>$request->stageTheme,'adresse_entreprise'=>$request->addressCompany,'tel_entreprise'=>$request->telCompany,'date_debut'=>$request->startDate, 'date_fin'=>$request->endDate, 'email_entreprise'=>$request->companyEmail, 'accord'=>$path1, 'assurance'=>$path2,'logo_company'=>$path3, 'assistant_pedagogique'=>$request->assistantPedag]);
                        
                            $demande=Demande_doc::create(['id_demande' =>$conventionStage->id, 'id_etudiant' => $etudiant->id, 'type_demande' => "convention stage", 'status' => "en cours", 'is_archive' => 0, 'date_demande'=>date('d/m/Y'), 'annee_univ'=>NULL]);
                       
                        break;
                }
                $success="Votre demande est bien envoyée";
                return view('formOne',compact('success'));
           } 
        }catch(Exception $e){
            // dd($e->getMessage());
            $errors2=$e->getMessage();
            return view('formOne',compact('errors2'));
        }
       
}
}
