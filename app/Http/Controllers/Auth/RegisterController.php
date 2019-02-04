<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Adldap\AdldapInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request, AdldapInterface $ldap)
    {
        #dd($ldap->getConnection());
        $attribute = [];
        $attribute['objectclass'][0] = "top";
        $attribute['objectclass'][1] = "person";
        $attribute['objectclass'][2] = "inetOrgPerson";
        $attribute['dn']   = 'CN=WEBSITE INTRANET,OU=Executive,OU=IT and MIS,OU=Head Office,DC=CACHETINDIA,DC=COM';
        $attribute['cn']   = $request->name;
        $attribute['sn']   = $request->name;
        $attribute['givenname']   = $request->name;
        $attribute['displayname']   = $request->name;
        $attribute['memberof']   = 'CN=' . $request->department . ',CN=Builtin,DC=CACHETINDIA,DC=COM';
        $attribute['countrycode']   = '91';
        $attribute['admincount']   = '0';
        $attribute['samaccountname']   = $request->name;
        $attribute['userprincipalname']   = $request->email_id;
        $attribute['roles']   = '2';
        $attribute['emp_code']    =  $request->emp_code;
        $attribute['designation']    =  $request->designation;
        $attribute['department']    =  $request->department;
        $attribute['date_of_birth']    =  $request->date_of_birth;
        $attribute['location']    =  'India';
        $attribute['mobile_no']    =  $request->mobile_no;
        $attribute['email_id']    =  $request->email_id;
        $attribute['photo']    =  '';
        #$attribute['distinguishedname']   = $request->;
        #$attribute['instancetype']   = $request->;
        #$attribute['whencreated']   = $request->;
        #$attribute['whenchanged']   = $request->;
        #$attribute['usncreated']   = $request->;
        #$attribute['usnchanged']   = $request->;
        #$attribute['useraccountcontrol']   = $request->;
        #$attribute['badpwdcount']   = $request->;
        #$attribute['codepage']   = $request->;
        #$attribute['badpasswordtime']   = $request->;
        #$attribute['lastlogoff']   = $request->;
        #$attribute['lastlogon']   = $request->;
        #$attribute['pwdlastset']   = $request->;
        #$attribute['primarygroupid']   = $request->;
        #$attribute['accountexpires']   = $request->;
        #$attribute['logoncount']   = $request->;
        #$attribute['samaccounttype']   = $request->;
        #$attribute['lastlogontimestamp']   = $request->;
        try {
            #dd();
            $rowConnection = $ldap->getConnection();
            $rowConnection->add(env('LDAP_BASE_DN'), $attribute);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function addUserToLdap()
    {
        return view('auth.register');
    }
}
