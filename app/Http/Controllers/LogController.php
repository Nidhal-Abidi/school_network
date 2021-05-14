<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;

class LogController extends Controller
{
    public function login(){
        return view('/log/login');
    }

    public function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            session()->pull('TypeUser');
            return redirect('/auth/login');
        }
    }


    public function check(){
        request()->validate([
            'login'=>'required',
            'password'=>'required|min:5'
        ]);

        $userInfo = Compte::where('login','=',request()->login)->first();
        
        if(!$userInfo){
            return back()->with('fail','We didn\'t recognize your Login');
        }else{
            //check password
            
            if(request()->password==$userInfo['PWD']){
                request()->session()->put('LoggedUser', $userInfo['LOGIN']);
                request()->session()->put('TypeUser', $userInfo['TYPE_COMPTE']);

                if ($userInfo['TYPE_COMPTE']== 'enseignant'){
                    return redirect('/teacher/index');
                }else if ($userInfo['TYPE_COMPTE']== 'personnel'){
                    return redirect('/staff/index');
                }
                else if ($userInfo['TYPE_COMPTE']== 'eleve'){
                    return redirect('/student/index');
                }
                else if ($userInfo['TYPE_COMPTE']== 'parent'){
                    return redirect('/parent/index');
                }
                

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    
}
