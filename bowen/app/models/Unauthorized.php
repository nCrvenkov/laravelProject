<?php

namespace App\models;

use Illuminate\Support\Facades\DB;

class Unauthorized
{
    public function login($email, $pass){
        return DB::table('accounts')
            ->where([
                ['email', '=', $email],
                ['password', '=', md5($pass)]
            ])
            ->first();
    }
    public function storeUnauthorizedMessage($name, $email, $message){
        return DB::table('unauthorizedmessages')
            ->insertGetId(['name'=>$name,'email'=>$email,'message'=>$message]);

    }
    public function getAllAppointments(){
        return DB::table('bowen_booked')
            ->get();
    }
    public function deleteAppointment($id){
        return DB::table('bowen_booked')
            ->where('id', $id)
            ->delete();
    }
    public function addUser($first_name, $last_name, $email, $pass){
        return DB::table('accounts')
            ->insertGetId(['first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'password'=>md5($pass),'registration_date'=>date('Y-m-d H:i:s'), 'active'=>1, 'roles_id'=>2]);
    }
    public function getComments(){
        return DB::table('comments')
            ->join('accounts', 'comments.account_id', '=', 'accounts.id')
            ->select('comments.*', 'accounts.id as acc_id','accounts.first_name','accounts.last_name')
            ->simplePaginate(3);
    }
    public function getImages(){
        return DB::table('gallery')
            ->get();
    }

}