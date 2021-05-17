<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Actualite;

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
}
