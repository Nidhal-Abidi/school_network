<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
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
                    return redirect('/dashboard/enseignant');
                }else if ($userInfo['TYPE_COMPTE']== 'personnel'){
                    return redirect('/dashboard/personnel');
                }
                else if ($userInfo['TYPE_COMPTE']== 'eleve'){
                    return redirect('/dashboard/eleve');
                }
                else if ($userInfo['TYPE_COMPTE']== 'parent'){
                    return redirect('/dashboard/parent');
                }
                

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    public function dashboard(){
        $arr=Compte::where('LOGIN','=', session('LoggedUser'))->first();
        $data = ['LoggedUserInfo'=>$arr];

        if ($arr['TYPE_COMPTE']== 'enseignant'){
            return view('dashboard.enseignant',$data);
        }
        else if ($arr['TYPE_COMPTE']== 'personnel'){
            return view('dashboard.personnel',$data);
        }
        else if ($arr['TYPE_COMPTE']== 'eleve'){
            return view('dashboard.eleve',$data);
        }
        else if ($arr['TYPE_COMPTE']== 'parent'){
            return view('dashboard.parent',$data);
        }
    }

    public function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            session()->pull('TypeUser');
            return redirect('/auth/login');
        }
    }
}
