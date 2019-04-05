<?php

namespace App\models;

use Illuminate\Support\Facades\DB;

class Authorized
{

    public function userInfo($id){
        return DB::table('accounts')
            ->where('id', $id)
            ->get();
    }
    public function getAdminMessages($to_id){
        return DB::table('usermessages')
            ->where('to_account_id', $to_id)
            ->get();
    }
    public function addUserComment($comment, $user_id, $date){
        DB::table('comments')
            ->insertGetId(['comment'=>$comment, 'account_id'=>$user_id, 'date'=> $date]);
        return "uspeh";
    }
    public function getJustComment($id){
        return DB::table('comments')
            ->where('account_id', $id)
            ->get();
    }
    public function getCommentsPaginate(){
        return DB::table('comments')
            ->join('accounts', 'comments.account_id', '=', 'accounts.id')
            ->select('comments.*', 'accounts.id as acc_id','accounts.first_name','accounts.last_name')
            ->simplePaginate(3);
    }
    public function getComments(){
        return DB::table('comments')
            ->get();
    }
    public function removeComm($id){
        return DB::table('comments')
            ->where('id', $id)
            ->delete();

    }
    public function updateData($id, $name, $surname, $email){
        return DB::table('accounts')
            ->where('id', $id)
            ->update(['first_name'=>$name, 'last_name'=>$surname, 'email'=>$email]);
    }
    public function updatePass($id, $pass){
        return DB::table('accounts')
            ->where('id', $id)
            ->update(['password'=>md5($pass)]);
    }
    public function getTime(){
        return DB::table('bowen_termini')
            ->get();
    }
    public function insertAppointment($date, $termin, $acc_id, $delete){
        return DB::table('bowen_booked')
            ->insertGetId(['date'=>$date, 'termin_id'=>$termin, 'account_id'=>$acc_id, 'delete_timestamp'=>$delete]);
    }
    public function getDates(){
        return DB::table('bowen_booked')
            ->join('bowen_termini', 'bowen_booked.termin_id','=','bowen_termini.id')
            ->get();
    }
    public function getUserAppointments($acc_id){
        return DB::table('bowen_booked')
            ->select(DB::raw('COUNT(account_id) as num'))
            ->where('account_id',$acc_id)
            ->get();
    }
    public function getUserDates($acc_id){
        return DB::table('bowen_booked')
            ->join('bowen_termini', 'bowen_booked.termin_id','=','bowen_termini.id')
            ->where('account_id', $acc_id)
            ->get();
    }
    public function getDateTimeAppointments($date, $terminId){
        return DB::table('bowen_booked')
            ->select(DB::raw('COUNT(date) as date_num'))
            ->where([
                ['date', $date],
                ['termin_id', $terminId]
            ])
            ->get();
    }
    public function storeUserMessage($message, $from, $to, $date){
        return DB::table('usermessages')
            ->insertGetId(['message'=>$message, 'from_account_id'=>$from, 'to_account_id'=>$to, 'date'=>$date]);
    }
    public function getImages(){
        return DB::table('gallery')
            ->get();
    }

}