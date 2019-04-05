<?php

namespace App\Http\Controllers;

use App\models\Authorized;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $data = [];
    public function indexPage(){
        return view('pages.indexUser');
    }
    public function userPage($id){
        $a = new Authorized();
        $res = $a->userInfo($id);
        $res2 = $a->getJustComment($id);
        $res3 = $a->getUserDates($id);
        $res4 = $a->getAdminMessages($id);


        if(count($res2)===0){
            $res2 = 0;
            if(count($res3)===0){
                $res3 = 0;
                $this->data['user'] = $res;
                $this->data['comment'] = $res2;
                $this->data['bookings'] = $res3;
                $this->data['adminAnswer'] = $res4;
                return view('pages.userPage',$this->data);
            }
            else{
                $this->data['user'] = $res;
                $this->data['comment'] = $res2;
                $this->data['bookings'] = $res3;
                $this->data['adminAnswer'] = $res4;
                return view('pages.userPage',$this->data);
            }
        }
        else{
            if(count($res3)===0){
                $res3 = 0;
                $this->data['user'] = $res;
                $this->data['comment'] = $res2;
                $this->data['bookings'] = $res3;
                $this->data['adminAnswer'] = $res4;
                return view('pages.userPage',$this->data);
            }
            else{
                $this->data['user'] = $res;
                $this->data['comment'] = $res2;
                $this->data['bookings'] = $res3;
                $this->data['adminAnswer'] = $res4;
                return view('pages.userPage',$this->data);
            }
        }
    }
    public function comments($id){
        $a = new Authorized();
        $res = $a->getCommentsPaginate();
        $allow_comment = $a->getComments();

        $array_id = [];
        for($i=0; $i<count($allow_comment); $i++){
            array_push($array_id, $allow_comment[$i]->account_id);
        }
        if(in_array($id, $array_id)){
            $this->data['allow_comment'] = 0;
        }
        else{
            $this->data['allow_comment'] = 1;
        }

        $this->data['comments'] = $res;

        return view('pages.userComments',$this->data);
    }
    public function postComment(Request $request){
        $comment = $request->userComment;
        $acc_id = $request->user_id;
        $date = date('Y-m-d H:i:s');

        $a = new Authorized();
        $a->addUserComment($comment, $acc_id, $date);
        return redirect('/userComments/'. $acc_id);
    }
    public function removeComment($id){
        $a = new Authorized();
        return $a->removeComm($id);
    }
    public function changeData(Request $request){
        $id = $request->dataUserId;
        $name = $request->updateFirstName;
        $surname = $request->updateLastName;
        $email = $request->updateEmail;

        $a = new Authorized();
        $a->updateData($id, $name, $surname, $email);
        return redirect('userPage/'.$id);

    }
    public function changePass(Request $request){
        $id = $request->passUserId;
        $pass = $request->newPass;

        $a = new Authorized();
        $a->updatePass($id, $pass);
        return redirect('userPage/'.$id);
    }
    public function appointmentPage(){
        $a = new Authorized();
        $res = $a->getTime();
        return view ('pages.bookAppointment', ['data'=>$res]);
    }
    public function bookBowen(Request $request){

        $a = new Authorized();

        $date = $request->bookDate;
        $termin = $request->bookTermin;
        $terminId = explode('.',$termin)[0];
        $terminTime = explode('.', $termin)[1];
        $account_id = $request->accId;

        $res = $a->getUserAppointments($account_id);

        $res2 = $a->getUserDates($account_id);
        $dates = [];

        foreach($res2 as $r) {
            array_push($dates, $r->date);
        }
        $res3 = $a->getDateTimeAppointments($date, $terminId);
        if($res3[0]->date_num >= 3){
            return redirect()->back()->with('error', 'Zao nam je, vec ima troje ljudi u ovom terminu');
        }
        else{
            if(in_array($date, $dates)){
                return redirect()->back()->with('error', 'Vec ste zakazali termin ovog dana');
            }
            else{
                if($res[0]->num >= 3){
                    return redirect()->back()->with('error', 'Vec ste zakazali tri termina');
                }
                else{
                    $year = explode('-',$date)[0];
                    $month = explode('-',$date)[1];
                    $day = explode('-',$date)[2];
                    $hour = explode(':', $terminTime)[0];
                    $minute = trim(explode('-',explode(':', $terminTime)[1])[0]);

                    $delete_timestamp = mktime($hour, $minute, 0, $month, $day, $year);

                    $a->insertAppointment($date, $terminId, $account_id, $delete_timestamp);
                    return redirect('/userPage/'.$account_id);
                }
            }
        }
    }
    public function userMessage(Request $request){
        $message = $request->message;
        $from_id = $request->acc_id;
        $to_id = 1;
        $date = date('Y-m-d H:i:s');

        $a = new Authorized();
        $a->storeUserMessage($message, $from_id, $to_id, $date);
        return redirect('/userPage/'. $from_id);
    }
    public function galleryPage(){
        $a = new Authorized();
        $res = $a->getImages();
        return view('pages.galleryUser',['data'=>$res]);
    }

}