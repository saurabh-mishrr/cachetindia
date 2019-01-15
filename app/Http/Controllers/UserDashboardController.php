<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //below method used for display user deshboard.
	public function index(){
		return view('app.userdesk');
	}

}
