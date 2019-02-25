<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateEmployeeMasterViaUsers extends Seeder
{
	public $userTableData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->getUserTableData();
        $this->updateEmployeeMaster();
    }

    public function getUserTableData()
    {
    	$this->userTableData = DB::table('users')
    						   ->select(['name', 'id', 'memberof', 'date_of_birth', 'mobile_no', 'email_id'])
    						   ->get()->toArray();

    }

    public function updateEmployeeMaster()
    {
    	$arr = array_map(function($fields){
    		$fields = json_decode(json_encode($fields), true);
    		return [
                    'emp_id' => $fields['id'],
    				'emp_code' => $fields['id'],
    				'emp_name' => $fields['name'],
    				'designation' => $fields['memberof'],
    				// 'location' => 'India',
    				// 'dob' => date('Y-m-d'),
    				// 'mobile_no' => '9004289222', //$fields['mobile_no'],
    				'email' => $fields['email_id'],
    				'created_on' => date('Y-m-d H:i:s'),
    				'updated_on' => date('Y-m-d H:i:s'),
    				// 'profile_pic' => '',
    				
    		];
    	}, $this->userTableData); 
    	DB::table('employee_master')
    	->insert($arr);
    }
}
