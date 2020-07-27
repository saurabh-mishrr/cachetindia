<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\BirthWishesDetail;
use DB;
class EmployeeMaster extends Model
{

    protected $table = 'users';

    public $timestamps = false;

    //use for retrive emp details.
    public function getBirthWishesData(){
          $empdata =  DB::table('users')
            ->select('*')
            ->where(DB::raw("concat(day(str_to_date(date_of_birth,'%d-%m-%Y')),'-',month(str_to_date(date_of_birth,'%d-%m-%Y')))"),"=",DB::raw("concat(day(now()),'-',month(now()))"))
            ->get(); 
           // dd($empdata);
        return $empdata;
     
    }
    
    //use for get new joiner data.
    public function getNewJoinee(){
         $empdata =  DB::table('users')
            ->select('*')
            ->where("new_joinee","Y")
           // ->take(3)
            ->get();  
            return $empdata;
    
    }
    
    
    


}
