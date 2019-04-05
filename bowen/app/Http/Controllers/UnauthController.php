<?php

namespace App\Http\Controllers;

use App\models\Unauthorized;
use Illuminate\Http\Request;

class UnauthController extends Controller
{
    public function index(){

        $u = new Unauthorized();
        $res = $u->getAllAppointments();
        $dateTime = time();


        foreach($res as $r){
            if($r->delete_timestamp < $dateTime){
                $u->deleteAppointment($r->id);
            }
        }

        return view('pages.index');
    }
    public function message(Request $request){
        $name = $request->Name;
        $email = $request->Email;
        $message = $request->Message;

        $u = new Unauthorized();
        $u->storeUnauthorizedMessage($name, $email, $message);
        return redirect()->back();
    }
    public function comments(){
        $u = new Unauthorized();
        $res = $u->getComments();
        return view('pages.unauthorizedComments',['data'=>$res]);
    }
    public function registration(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $pass = $request->password;

        $u = new Unauthorized();
        $u->addUser($first_name, $last_name, $email, $pass);
        return redirect('/index')->with('poruka','Uspešno ste se registrovali!');
    }
    public function galleryPage(){
        $u = new Unauthorized();
        $res = $u->getImages();
        return view('pages.gallery',['data'=>$res]);
    }
    public function aboutPage(){
        return view('pages.about');
    }
}