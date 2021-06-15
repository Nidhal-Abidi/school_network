<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Actualite;
use App\Models\ActualiteFiliere;
use App\Models\ActualiteNiveau;

class StaffController extends Controller
{
    public function index(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/staff/index',$data);
    }

    public function profile(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/staff/profile',$data);
    }

    public function edit(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/staff/edit',$data);
    }

    public function update(){
        $data=request()->validate([
            'email'=>'required|email',
            'pwd'=>'required|min:5',
            'numtel'=>'required|min:8|max:8'
        ]);

        $var=Compte::findOrFail(session('LoggedUser'));
               
        $var->update(['LOGIN'=>$var['LOGIN'],
            'LOGINELEVE'=>$var['LOGINELEVE'],
            'IDFILIERE'=>$var['IDFILIERE'],
            'NIVEAU'=>$var['NIVEAU'],
            'NOMCLASSE'=>$var['NOMCLASSE'],
            'NOM'=>$var['NOM'],
            'PRENOM'=>$var['PRENOM'],
            'NUMTEL'=>$data['numtel'],
            'EMAIL'=>$data['email'],
            'GENDER'=>$var['GENDER'],
            'PWD'=>$data['pwd'],
            'DATENAIS'=>$var['DATENAIS'],
            'ACTIVE_STATUS'=>$var['ACTIVE_STATUS'],
            'TYPE_COMPTE'=>$var['TYPE_COMPTE'],
            'POSTE'=>$var['POSTE'],
            'SPECIALITE'=>$var['SPECIALITE']
        ]);
        
        $var->save();
        return redirect('/staff/profile');
    }

    public function showNews(){
        $actualite= Actualite::all();
        return view ('/staff/shownews',['actualite'=>$actualite]);
    }

    public function createNews(){
        return view ('/staff/createnews');
    }

    public function saveNews(){
        $data=request()->validate([
            'categorie'=>'required|min:5|max:50|unique:actualite,CATEGORIE',
            'body'=>'required|min:5',
            'filiere'=>'required',
            'niveau'=>'required'
        ]);
        //dd($data['filiere']);
        $derniereAct=Actualite::orderBy('IDACT','DESC')->first();
        $act= new Actualite();
        $derniereAct->IDACT=$derniereAct->IDACT+1;
        
        
        /* Enregistrement dans BD nvlle ligne pour table ActualiteNiveau */ 
        
        foreach($data['niveau'] as $niv){
            foreach ($data['filiere'] as $filiere) {
                if(($niv==1 and $filiere!='general') or ($niv==2 and ($filiere =='general' or $filiere =='math' or $filiere =='technique' ) or ($niv!=1 and $filiere=='general'))){
                    return back()->with('fail','Year and Section are incompatible');
                }
                else{
                    $actniv = new ActualiteNiveau();
                    $actniv->IDACT=$derniereAct->IDACT;
                    $actniv->IDFILIERE=$filiere;
                    $actniv->NIVEAU=$niv;
                    $actniv->save();
                }
                
            }
        }
        /* Enregistrement dans BD nvlle ligne pour table Actualite */ 
        $act->IDACT=$derniereAct->IDACT;
        $act->CATEGORIE=$data['categorie'];
        $act->BODY=$data['body'];
        $act->CREATED_AT=now()->toDateString();
        $act->UPDATED_AT=now()->toDateString();
        
        $act->save();
        /* Enregistrement dans BD nvlle ligne pour table ActualiteFiliere */ 
        foreach($data['filiere'] as $fil){
            //dd($fil);
            $actfil = new ActualiteFiliere();
            $actfil->IDACT=$derniereAct->IDACT;
            $actfil->IDFILIERE=$fil;
            //echo $actfil->IDACT.' * '.$actfil->IDFILIERE.'<br>';
            $actfil->save();
        }

        return redirect('/staff/news');
    }

    public function updateNews(){
        return view('/staff/updatenews');
    }

    public function saveUpdatedNews(){
        $data=request()->validate([
            'categorie'=>'required|min:5|max:50',
            'body'=>'required|min:5'
        ]);
        
        $actExists=Actualite::where('CATEGORIE','=',$data['categorie'])->get();
        //dd($actExists);
        
        if($actExists->isEmpty()){
            return back()->with('fail','Categorie doesn\'t exist !!');
        } 
        else{
            $categorie=$data['categorie'];
            $actExists=Actualite::where('CATEGORIE','=',$data['categorie'])->first();
            $actExists->BODY=$data['body'];
            $actExists->UPDATED_AT=now()->toDateString();
            
            //dd($actExists);
            $actExists->save();
            return redirect('/staff/news');
        }
    }

    public function deleteNews(){
        return view('/staff/deletenews');
    }

    public function saveDeletion(){
        $data=request()->validate([
            'categorie'=>'required|min:5|max:50',
        ]);
        
        $actExists=Actualite::where('CATEGORIE','=',$data['categorie'])->get();
        
        if($actExists->isEmpty()){
            return redirect('/staff/news/delete')->with('fail','Categorie doesn\'t exist !!');
        } 
        else{
            $actualite=Actualite::where('CATEGORIE','=',$data['categorie'])->first();

            ActualiteFiliere::where('IDACT','=',$actualite->IDACT)->delete();
            ActualiteNiveau::where('IDACT','=',$actualite->IDACT)->delete();
            $actualite->delete();
            return redirect('/staff/news');
        }
    }

    public function viewTimeTable(){
        return view('/staff/viewTimeTable');
    }

    public function messaging(){
        return view('/staff/messaging');
    }
}
