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
            ->where('id', $id)
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
            ->get();  
        return $empdata;
    }
    
     //use for retrive emp details.
    public function getEmpData($term){
        $empdata =  DB::table('users')
            ->select('*')
            ->orderBy('name','desc')
            //->take(10)
            ->where('name', 'like',  '%' . $term .'%')
            ->orWhere('location', 'like',  '%' . $term .'%')
            ->orWhere('department', 'like',  '%' . $term .'%')
            ->orWhere('mobile_no', 'like',  '%' . $term .'%')
            ->orWhere('email_id', 'like',  '%' . $term .'%')
            ->orWhere('designation', 'like',  '%' . $term .'%')
        
            ->get();  
        return $empdata;
     
    }
    
}
