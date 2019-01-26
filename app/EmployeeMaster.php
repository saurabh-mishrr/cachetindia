<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\BirthWishesDetail;
use DB;
class EmployeeMaster extends Model
{

    protected $table = 'employee_master';

    public $timestamps = false;

   //use for retrive emp details.
    public function getBirthWishesData(){
       $empdata =  DB::table('employee_master')
            ->join('emp_bod_wishes_detail', 'employee_master.emp_id', '=', 'emp_bod_wishes_detail.emp_id')
            ->select('employee_master.emp_id', 'employee_master.emp_name', 'employee_master.profile_pic','emp_bod_wishes_detail.comment')
            ->orderBy('emp_bod_wishes_detail.created_on','desc')
            ->take(5)
            ->get();  
                    return $empdata;
     
    }
}
