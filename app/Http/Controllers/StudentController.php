<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Actualite;
use App\Models\ActualiteFiliere;
use App\Models\ActualiteNiveau;

class StudentController extends Controller
{
    public function index(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/student/index',$data);
    }

    public function profile(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/student/profile',$data);
    }

    public function edit(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/student/edit',$data);
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
        //dd($var);
        return redirect('/student/profile');
    }

    public function shownews(){
        $eleve=Compte::findOrFail(session('LoggedUser'));
        
        $act=Compte::join('actualiteniveau','actualiteniveau.NIVEAU','=','compte.NIVEAU')
        ->select('actualiteniveau.IDACT')    
        ->distinct()        
        //->where('actualiteniveau.IDFILIERE','compte.IDFILIERE')
        ->where('compte.LOGIN','=',$eleve->LOGIN)
        ->get();

        //dd($act);
        $idActEleve=array();
        $chaineIdActEleve="";
        if(! empty($act)){
            foreach ($act as $key) {    
                array_push($idActEleve,$key->IDACT);
            }
            $chaineIdActEleve=implode("','",$idActEleve);
        }
        /*$chaineIdActEleve => afin de former une chaine qu'on peut utiliser dans la req SQL*/ 
        $chaineIdActEleve="('".$chaineIdActEleve."')";
        $actualite=\DB::select("select * from actualite where IDACT in $chaineIdActEleve;");
        //dd($actualite);
        return view ('/student/shownews',['actualite'=>$actualite]);
    }

    public function messaging(){
        return view('student/messaging');
    }
}
