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
            ->select('event_master.*', 'event_gallery.pic')
            ->orderBy('event_master.created_on','desc')
            ->get();  
         return $eventdata;
     
	}

  //use for get gallery data.
    public function getGallaryDataEventWise($event_id){
            $picArray=array();
            $matchThese = ['event_master.status' => '1'];
            $eventdata = DB::table('event_master')
                   ->where($matchThese)
                   ->select('event_master.*')
                   ->get();  
        foreach ($eventdata as $key => $value) {
                $matchThese = ['event_gallery.event_id' => $value->event_id];
                $picdata = DB::table('event_gallery')
                   ->where($matchThese)
                   ->select( 'event_gallery.*')
                   ->get();  
                        $picArray[$key]['event_id']=$value->event_id;
                        $picArray[$key]['event_name']=$value->name;
                        $picArray[$key]['pics']=$picdata;
                   


        }     
            return $picArray;
         
    }
}
