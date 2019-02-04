<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\EventMaster;

class EventGallery extends Model
{
    protected $table = "event_gallery";
	public $timestamps = false;

	//use for retrive event data.
	public function getGallaryData(){
		$eventdata = DB::table('event_gallery')
         	   ->join('event_master', 'event_gallery.event_id', '=', 'event_master.event_id')
         	   ->where("event_master.status","1")
            ->select('event_master.name', 'event_gallery.pic')
            ->orderBy('event_master.created_on','desc')
            ->get();  
         return $eventdata;
     
	}

}
