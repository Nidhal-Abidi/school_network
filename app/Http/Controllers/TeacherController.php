<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Actualite;
use App\Models\Classe;
use App\Models\Seance;
use App\Models\AbsenceRetardEleve;


class TeacherController extends Controller
{
    public function index(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/teacher/index',$data);
    }
    public function profile(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/teacher/profile',$data);
    }

    public function edit(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];
        return view('/teacher/edit',$data);
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
        return redirect('/teacher/profile');
    }

    public function showNews(){
        $actualite= Actualite::all();
        
        return view ('/teacher/shownews',['actualite'=>$actualite]);
    }

    public function chooseClass(){
        $classe=Classe::all();
        $data=array();
        $filiere=['math','general','info','lettres','eco_gestion','science','technique'];
        $niveau=[1,2,3,4];
        foreach ($classe as $key ) {
            array_push($data,$key->NOMCLASSE);
        }
        return view('/teacher/chooseclass',[
            'classes'=>$data,
            'filiere'=>$filiere,
            'niveau'=>$niveau
            ]);
    }

    public function showStudents(){
        $data=request()->validate([
            'filiere'=>'required',
            'niveau'=>'required',
            'classe'=>'required',
            'datesem'=>'required',
            'days'=>'required',
            'beg_h'=>'required'
        ]);

        $arr=Seance::where([ ['IDFILIERE','=',$data['filiere']],
            ['NIVEAU','=',$data['niveau']],
            ['NOMCLASSE','=',$data['classe']],
            ['DATESEM','=',$data['datesem']],
            ['NUMJOUR','=',$data['days']],
            ['HEUREDEB','=',$data['beg_h']],
            ['LOGINENSEIGNANT','=',session('LoggedUser')]
            ])->first();
        //dd($arr);

        if(empty($arr)){
            return back()->with('fail','No Such Session(Séance) is present in DB. Make sure that your values are correct!!');
        }
        else{
             
            $students=Compte::where([
                ['TYPE_COMPTE','=','eleve'],
                ['NOMCLASSE','=',$data['classe']]
            ])->get();
            //dd($students[0]);
            
            $arrStudents=array();
            foreach ($students as $key ) {
                $arrStudents[$key->LOGIN]=$key->NOM.' '.$key->PRENOM;
            }
            //dd($arrStudents);

            if(empty($arrStudents)){
                return back()->with('fail','No students are registered to the chosen class');
            }
            else{
                /*Storing the data related to "seance" that the students where absent in for later use in the function : saveAbsentStudents() */


                request()->session()->put('absentStudInfo',$data);
                return view('/teacher/showstudents',[
                    'arrStudents'=>$arrStudents
                ]);
            }
        }
    }

    public function saveAbsentStudents(){
        $absentStudents = request()->input('absentStudents');
        $absentStudInfo=request()->session()->get('absentStudInfo');
        //dd($absentStudInfo);
        foreach ($absentStudents as $key ) {
            $already_existant_rows=AbsenceRetardEleve::where('LOGIN','=',$key)->first();
            if(!empty($already_existant_rows)){
                return redirect('/teacher/chooseclass')->with('fail','You have already done attendance for this class !!');
            }else{
                $rowInAbsenceRetardEleve=new AbsenceRetardEleve();

                $rowInAbsenceRetardEleve->LOGIN=$key;
                $rowInAbsenceRetardEleve->IDFILIERE=$absentStudInfo['filiere'];
                $rowInAbsenceRetardEleve->NIVEAU=$absentStudInfo['niveau'];
                $rowInAbsenceRetardEleve->NOMCLASSE=$absentStudInfo['classe'];
                $rowInAbsenceRetardEleve->DATESEM=$absentStudInfo['datesem'];
                $rowInAbsenceRetardEleve->NUMJOUR=$absentStudInfo['days'];
                $rowInAbsenceRetardEleve->HEUREDEB=$absentStudInfo['beg_h'];
                $rowInAbsenceRetardEleve->NATURE='A';
                $rowInAbsenceRetardEleve->ABSENCEJUSTIFIEE=0;
                //dd($rowInAbsenceRetardEleve);

                $rowInAbsenceRetardEleve->save();
                /* you can add here - after saving into the DB - mailing to the parents of the students that they're absent in a specific lesson */
            }
        }
        return redirect('/teacher/index');
        //dd($absentStudents);


    }
}
