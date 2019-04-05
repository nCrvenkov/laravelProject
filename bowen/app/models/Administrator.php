<?php

namespace App\models;

use Illuminate\Support\Facades\DB;

class Administrator
{
    public function getUsers(){
        return DB::table('accounts')
            ->where('roles_id' , 2)
            ->get();
    }
    public function makeAdmin($id){
        return DB::table('accounts')
            ->where('id', $id)
            ->update(['roles_id' => 1]);
    }
    public function removeUser($id){
        return DB::table('accounts')
            ->where('id', $id)
            ->delete();
    }
    public function getUserForUpdate($id){
        return DB::table('accounts')
            ->where('id', $id)
            ->get();
    }
    public function userUpdate($id, $f_name, $l_name, $email){
        return DB::table('accounts')
            ->where('id', $id)
            ->update(['first_name' => $f_name, 'last_name' => $l_name, 'email' => $email]);
    }
    public function getAppointments(){
        return DB::table('bowen_termini')
            ->get();
    }
    public function newAppoint($id, $termin){
        return DB::table('bowen_termini')
            ->where('id', $id)
            ->update(['termin' => $termin]);
    }
    public function removeAppointment($id){
        return DB::table('bowen_termini')
            ->where('id', $id)
            ->delete();
    }
    public function insertTermin($termin){
        return DB::table('bowen_termini')
            ->insertGetId(['termin' => $termin]);
    }
    public function getComments(){
        return DB::table('comments')
            ->join('accounts', 'comments.account_id', '=', 'accounts.id')
            ->select('comments.*', 'accounts.id as acc_id','accounts.first_name','accounts.last_name')
            ->simplePaginate(3);
    }
    public function removeComment($id){
        return DB::table('comments')
            ->where('id', $id)
            ->delete();
    }
    public function getAccountMessages(){
        return DB::table('usermessages')
            ->join('accounts', 'usermessages.from_account_id', '=', 'accounts.id')
            ->where('accounts.id' , ">", 1)
            ->select('usermessages.*', 'accounts.id as acc_id', 'accounts.first_name', 'accounts.last_name')
            ->get();
    }
    public function storeAdminMessage($message, $from, $to, $date){
        return DB::table('usermessages')
            ->insertGetId(['message'=>$message, 'from_account_id'=>$from, 'to_account_id'=>$to, 'date'=>$date]);
    }
    public function removeMessage($id){
        return DB::table('usermessages')
            ->where('id', $id)
            ->delete();
    }
    public function insertIp($ip){
        return DB::table('ip_addresses')
            ->insertGetId([
                "ip"=>$ip
            ]);
    }
    public function getIp(){
        return DB::table('ip_addresses')
            ->select('ip')
            ->distinct()
            ->get();
    }
    public function getTermin(){
        return DB::table('bowen_booked')
            ->join('bowen_termini', 'bowen_booked.termin_id', '=', 'bowen_termini.id')
            ->join('accounts', 'bowen_booked.account_id', '=', 'accounts.id')
            ->get();
    }
}