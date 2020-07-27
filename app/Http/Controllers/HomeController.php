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
        $role = Auth::user()->memberof;
        //dd($role);
        switch ($role) {
            case 'CN=Administrators,CN=Builtin,DC=CACHETINDIA,DC=COM':
                
                break;
            case 'CN=ACCOUNTS,OU=Accounts,OU=Head Office,DC=CACHETINDIA,DC=COM':
                return redirect()->route('salary.create');
                break;
            default:
                return redirect('login');
                break;
        }
    }
 
}
