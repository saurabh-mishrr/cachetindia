<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Adldap\Laravel\Traits\HasLdapUser;
use DB;
//namespace App\Models\SalarySlip;


class User extends Authenticatable
{
    use Notifiable, HasLdapUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //use for retrive emp details.
    public function getAllUser(){
        $empdata =  DB::table('users')
            ->select('*')
            ->get();  
        return $empdata;
     
    }

    //use for update profile pic as per user id.
    public function updateIdWiseUser($id,$picname){
            DB::table('users')
            ->where('id', 1)
            ->update(['photo' => $picname]);
            return true;
    }

    //use for get salary slip as per userwise
    public function getUserSalSlip($userid){
         $empdata =  DB::table('salary_slip')
            ->select('*')
            ->where('emp_id',$userid)
            ->orderBy('created_at','desc')
            ->take(1)
             >get();  
        return $empdata;
     
    }
    
}
