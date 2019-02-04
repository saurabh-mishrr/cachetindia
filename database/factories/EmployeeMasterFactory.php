<?php

use Faker\Generator as Faker;

$factory->define(App\EmployeeMaster::class, function (Faker $faker) {
    return [
        #'emp_id' => $faker->unique()->randomDigitNotNull(),
		'emp_code' 				=> $faker->unique(true)->randomDigitNotNull(),
		'emp_name' 				=> $faker->name,
		'designation' 			=> $faker->word,
		'location' 				=> 'india',
		'dob' 					=> $faker->date($format = 'Y-m-d', $max = 'now'),
		'mobile_no' 			=> $faker->phoneNumber,
		'email' 				=> $faker->email,
		'status' 				=> 1,
		'profile_pic' 			=> $faker->image('public', 250, 75, 'cats'),
		'created_by' 			=> 1,
		'updated_by' 			=> 1,
		'created_on' 			=> $faker->dateTime(),
		'updated_on' 			=> $faker->dateTime(),
    ];
});






     
   
   

   
        
  
      
     

 
 
 
 