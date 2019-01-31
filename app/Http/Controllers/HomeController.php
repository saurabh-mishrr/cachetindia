<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use Adldap\AdldapInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	protected $ldap;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdldapInterface $ldap)
    {
        $this->ldap = $ldap;
    }


    public function index(Request $request)
    {
    	/*Auth::logout();
    	return redirect('/login');*/
    	dd($request->session()->get('name'));
    	echo "<pre>";
    	print_r($this->ldap->search()->users()->get($request->session()->all()));
    	exit;
    	#Auth::logout();
    	#return redirect('/login');
    }
 
}
