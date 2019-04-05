<?php

namespace App\Http\Controllers;

use App\models\Administrator;
use DeepCopy\f001\A;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $data = [];
    public function indexPage(){
        $a = new Administrator();
        $res = $a->getIp();
        $res2 = $a->getTermin();

        $this->data['ip']=$res;
        $this->data['termini']=$res2;

        return view('adminPages.indexAdmin', $this->data);
    }
    public function users(){
        $a = new Administrator();
        $res = $a->getUsers();
        return view('adminPages.manageUsers', ['data'=>$res]);
    }
    public function updateAdmin($id){
        $a = new Administrator();
        $a->makeAdmin($id);
        return "uspeh";
    }
    public function deleteUser($id){
        $a = new Administrator();
        return $a->removeUser($id);
    }
    public function getUser($id){
        $a = new Administrator();
        return $a->getUserForUpdate($id);
    }
    public function updateUser(Request $request, $id){
        $f_name = $request->first_name;
        $l_name = $request->last_name;
        $email = $request->email;
        $a = new Administrator();
        try {
            return $a->userUpdate($id, $f_name, $l_name, $email);
        }
        catch(\Exception $ex){
            return $ex;
        }

    }
    public function manageAppPage(){
        $a = new Administrator();
        $res = $a->getAppointments();
        return view ('adminPages.manageAppointments', ['data'=>$res]);
    }
    public function updateAppointment(Request $request){

        $request->validate([
            'termin_update' => 'regex:/^[0-9][0-9]:[0-9][0-9]\s-\s[0-9][0-9]:[0-9][0-9]$/'
        ]);

        $id = $request->updateAppId;
        $termin = $request->termin_update;
        $a = new Administrator();
        try{
            $a->newAppoint($id, $termin);
            return redirect()->back();
        }catch(\Exception $ex){
            return $ex;
        }


    }
    public function deleteAppointment(Request $request){
        $id = $request->deleteTerminId;
        $a = new Administrator();
        $a->removeAppointment($id);
        return redirect()->back();
    }
    public function insertAppointment(Request $request){

        $request->validate([
            'termin' => 'regex:/^[0-9][0-9]:[0-9][0-9]\s-\s[0-9][0-9]:[0-9][0-9]$/'
        ]);

        $termin = $request->termin;
        $a = new Administrator();
        $a->insertTermin($termin);
        return redirect()->back();

    }
    public function commentsPage(){
        $a = new Administrator();
        $res = $a->getComments();
        return view('adminPages.adminComments', ['data'=>$res]);
    }
    public function removeComment($id){
        $a = new Administrator();
        try{
            return $a->removeComment($id);
        }
        catch(\Exception $ex){
            return $ex;
        }

    }
    public function messagesPage(){
        $a = new Administrator();
        $res = $a->getAccountMessages();
        return view ('adminPages.messagesAdmin', ['data'=>$res]);
    }
    public function answerAdmin(Request $request){
        $message = $request->answerMessage;
        $to_id = $request->acc_id;
        $from_id = 1;
        $date = date('Y-m-d H:i:s');

        $a = new Administrator();
        $a->storeAdminMessage($message, $from_id, $to_id, $date);
        return redirect()->back();

    }
    public function deleteMessages($id){
        $a = new Administrator();
        try{
            return $a->removeMessage($id);
        }
        catch(\Exception $ex){
            return $ex;
        }
    }
}
