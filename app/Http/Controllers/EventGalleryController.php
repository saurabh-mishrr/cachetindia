<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventGallery;
use \Auth;
use App\User;
class EventGalleryController extends Controller
{
     //below method used for display gallery photos.
    public function index(){
        $event = new EventGallery();
        $user = Auth::user();
     
         $eventdata = $event->getGallaryDataEventWise($_GET['event']);
         return view('app.gallerylist',array('gallarydata'=>$eventdata,"userdata"=>$user));
    }
}
