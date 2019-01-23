<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthWishesDetail;
use App\EmployeeMaster;

class UserDashboardController extends Controller
{
    //below method used for display user deshboard.
	public function index(){
		$emp = new EmployeeMaster();
		$data = $emp->getBirthWishesData();
		return view('app.userdesk',array('birthWishesData'=>$data));
	}

}
