<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMaster extends Model
{
	protected $table = "event_master";
	public $timestamps = false;
    protected $fillable = [
        'name','pic'
    ];


  
}
