<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Achievement extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'achievement_master';
    public $primaryKey = 'idPrimary';
    public $timestamps = false;
    
    protected $attributes = [
        'status' => '1',
    ];

    public function getAchievementData(){
    	$eventdata = DB::table('achievement_master')
         	   ->where("status","1")
               ->orderBy('created_on','desc')
               ->limit(1)
            ->get();  
         return $eventdata;
     
    }
}
