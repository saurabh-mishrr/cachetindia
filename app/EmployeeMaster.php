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
            ->join('emp_bod_wishes_detail', 'users.id', '=', 'emp_bod_wishes_detail.emp_id')
            ->select('users.id', 'users.name', 'users.photo','emp_bod_wishes_detail.comment')
            ->orderBy('emp_bod_wishes_detail.created_on','desc')
            ->take(3)
            ->get();  
        return $empdata;
     
    }


}
