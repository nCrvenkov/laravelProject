<?php

namespace App\Http\Controllers;

use App\models\Authorized;
use App\models\Unauthorized;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function login(Request $request){

        $request->validate([
            'login_email' => 'required|email',
            'login_pass' => 'required|min:5'
        ]);

        $email = $request->input('login_email');
        $pass = $request->input('login_pass');

        $a = new Unauthorized();
        $res = $a->login($email, $pass);


        if(empty($res)){
            return redirect()->back()->with('poruka', 'Pogrešni parametri za logovanje');
        }
        else{
            if($res->roles_id === 1){
                $request->session()->push('admin',$res);
                return redirect('/indexAdmin');
            }
            elseif($res->roles_id === 2){
                $request->session()->push('user',$res);
                return redirect('/indexUser');
            }
        }
    }
    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/index');
    }

}
